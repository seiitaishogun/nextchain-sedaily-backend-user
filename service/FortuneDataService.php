<?php

namespace Service;

use App\Models\Content\Content;
use App\Models\Fortune\Fortune;
use App\Models\Fortune\FortuneData;
use App\Models\Payment\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Service\Fortune\ConstellationService;
use Service\Fortune\FortuneService;
use Service\Fortune\JamidusuService;
use Service\Fortune\JuyeogService;
use Service\Fortune\SajuApiService;
use Service\Fortune\SajuService;
use Service\Fortune\SibijisinService;
use Service\Fortune\TarotService;

class FortuneDataService
{
    private const TYPE_CONSTELLATION = 'constellation';

    private const TYPE_JAMIDUSU = 'jamidusu';

    private const TYPE_JUYEOG = 'juyeog';

    private const TYPE_SAJU = 'saju';

    private const TYPE_TAROT = 'tarot';

    private const TYPE_ZODIAC = 'zodiac';

    /**
     * 구매 결과
     */
    public function getPurchaseResource(string $type, Purchase $purchase, array $resource, array|string|null $fortuneValue): array
    {
        $fortuneData = [];
        foreach ($resource['children'] as $data) {
            foreach ($data->contentFortunes as $fortune) {
                $fortuneData[] = $this->getFortuneData($data, $fortune, $fortuneValue, $purchase);
            }
        }
        $fortuneData['daeun'] = $fortuneValue[0]['daeun'] ?? null;
        $resource['children_data'] = [...array_filter($fortuneData)];

        if ($type === self::TYPE_SAJU) {
            $resource['saju'] = (new SajuService())->getPurchaseSaju($purchase);
        } elseif ($type === self::TYPE_JAMIDUSU) {
            $resource['myeongban'] = (new JamidusuService())->getMyeongban($purchase);
        }

        if (isset($resource['children_data']['daeun'])) {
            $resource['daeun'] = $resource['children_data']['daeun'];
            unset($resource['children_data']['daeun']);
        }

        return $resource;
    }

    /**
     * 구매 결과 기본 리소스
     */
    public function initPurchaseResource(Content $content, Purchase $purchase): array
    {
        $resource['purchase'] = $purchase->load('partner')->toArray();
        $resource['content'] = $content->load(['banner', 'bannerText', 'thumbnail', 'type']);
        $resource['parents'] = $content->parentData;
        $resource['children'] = $content->childrenData;

        $contentType = $content->type->name;
        if ($contentType === self::TYPE_JUYEOG) {
            $resource['purchase']['gwae'] = (new JuyeogService())->getGwae($purchase->value);
        } elseif ($contentType === self::TYPE_ZODIAC || $contentType === self::TYPE_CONSTELLATION) {
            $resource['purchase']['value'] = (int) Purchase::where('id', $purchase->id)->value('value');
        }

        return $resource;
    }

    /**
     * 운세 초기값
     */
    public function initFortuneValue(string $type, Purchase $purchase): null|array|string
    {
        if ($type === self::TYPE_SAJU) {
            $fortuneValue[0] = $this->initSajuByFortuneApi($purchase);
            if ($purchase->partner) {
                $fortuneValue[1] = $this->initSajuByFortuneApi($purchase->partner);
            }
        } elseif ($type === self::TYPE_JUYEOG) {
            $fortuneValue = (new JuyeogService())->getGwae($purchase->value)->toArray();
        } else {
            $fortuneValue = $purchase->value;
        }

        return $fortuneValue;
    }

    public function initSajuByFortuneApi(Model $model): int|array
    {
        $userData = [
            'name' => $model->name,
            'gender' => $model->gender,
            'marital' => $model->marital,
            'birthed_at' => $model->birthed_at,
            'calendar' => $model->calendar,
        ];

        return (new SajuApiService())->getSaju($userData);
    }

    /**
     * 운세 풀이 데이터
     */
    private function getFortuneData($data, $fortune, array|string|null $fortuneValue, Purchase $purchase): ?FortuneData
    {
        $fortune = $fortune->load(
            'condition1.type:id,name',
            'condition2.type:id,name',
            'condition3.type:id,name',
            'condition4.type:id,name',
            'type:id,name',
        )->toArray();
        $query['fortune_id'] = $fortune['id'];

        for ($i = 1; $i < 5; $i++) {
            if (empty($fortune['condition'.$i])) {
                $query['value'.$i] = null;

                continue;
            }

            $condition = $fortune['condition'.$i];
            $fortuneService = new FortuneService();
            $isPartner = $fortuneService->checkPartner($fortune, $i);

            $query['value'.$i] = match ($condition['type']['name'] ?? null) {
                self::TYPE_SAJU => (new SajuService())->getSaju($condition, $fortuneValue[$isPartner], $data),
                self::TYPE_JUYEOG => $fortuneValue['name'],
                self::TYPE_TAROT => (new TarotService())->getTarot($purchase->value, $data->parent_id),
                self::TYPE_ZODIAC => (new SibijisinService())->getZodiac($condition, $data->parent_id),
                self::TYPE_CONSTELLATION => (new ConstellationService())->constellation($data),
                self::TYPE_JAMIDUSU => (new JamidusuService())->jamidusu($purchase),
                default => $this->getCommonFortuneConditionValue($condition, $purchase, $isPartner),
            };
        }

        $fortuneData = FortuneData::where($query)
            ->with('fortune.template:id,name', 'fortune.type:id,name')
            ->first();

        if (! $fortuneData && Fortune::find($query['fortune_id'])->type->id !== 4) {
            $fortuneData = FortuneData::where('fortune_id', $query['fortune_id'])
                ->inRandomOrder()
                ->first();
        }

        if ($fortuneData) {
            $fortuneData['child_id'] = $data->id;
        }

        return $fortuneData ?? null;
    }

    /**
     * fortune->type_id가 null인 공통 조건
     */
    private function getCommonFortuneConditionValue(array $condition, Purchase $purchase, bool $isPartner): string
    {
        $user = $isPartner ? $purchase->partner : $purchase;

        return match ($condition['path']) {
            'gender' => $user->gender,
            'marital' => $user->marital,
            'year' => (int) Carbon::parse($purchase->users->birthed_at)->format('Y'),
            'month' => (new SajuService())->month(),
            'week' => Carbon::now()->weekOfYear === 53 ? 0 : Carbon::now()->weekOfYear,
            'day' => (int) Carbon::parse($purchase->created_at)->format('d'),
            'survey' => $purchase->survey_value,
        };
    }
}
