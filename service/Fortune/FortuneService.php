<?php

namespace Service\Fortune;

use App\Models\Content\Content;
use App\Models\Content\ContentData;
use App\Models\Fortune\FortuneData;
use App\Models\Payment\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class FortuneService
{
    /**
     * 상대방 사주 or 내 사주로 보는것인지
     */
    public function checkPartner(array $fortune, int $count): bool
    {
        $partner = false;

        if ($fortune['status'] === 1) {
            $partner = true;
        }
        if ($fortune['status'] === 2 && $count > 2) {
            $partner = true;
        }

        return $partner;
    }

    /**
     * 사주 조건값. 사주 배열을 받아서 조건의 path에 따라 값 반환
     */
    public function saju($condition, $saju, $data): string
    {
        if (Str::contains($condition['path'], 'month')) {
            $month = $data->order + 1;
            $conditionValue = $saju['tojeong']['month'][$month];
        } elseif (Str::contains($condition['path'], 'singangyag')) {
            $count = mb_substr($condition['path'], -1);
            $conditionValue = Str::substr($saju['singangyag'], 0, $count);
        } elseif (Str::contains($condition['path'], ',')) {
            $conditionValue = &$saju;
            foreach (explode(',', $condition['path']) as $path) {
                $conditionValue = &$conditionValue[$path];
            }
        } else {
            $conditionValue = $saju[$condition['path']];
        }

        return $conditionValue;
    }

    /**
     * 순서에 따라 뽑은 타로 카드 반환
     */
    public function tarot($values, int $parentId): string
    {
        $order = ContentData::find($parentId)->order;

        return explode(',', $values)[$order];
    }

    /**
     * 운세 순서에 맞춰 십이지신 반환
     */
    public function zodiac($condition, int $parentId): string
    {
        $order = ContentData::find($parentId)->order;

        return match ($condition['path']) {
            'sibijisin' => $order,
            'sibijisin_number' => (new SajuApiService())->getSibijisinNumber()['sibijisin'][$order],
        };
    }

    /**
     * 운세 순서에 맞춰 별자리 반환
     */
    public function constellation($data): string
    {
        $order = ContentData::find($data->parent_id)->order;

        return [
            0 => '양자리', 1 => '황소자리', 2 => '쌍둥이자리', 3 => '게자리', 4 => '사자자리', 5 => '처녀자리',
            6 => '천칭자리', 7 => '전갈자리', 8 => '사수자리', 9 => '염소자리', 10 => '물병자리', 11 => '물고기자리',
        ][$order];
    }

    /**
     * fortune->type_id가 null인 공통 조건
     */
    public function common(array $condition, Purchase $purchase, bool $isPartner): string
    {
        $user = $isPartner ? $purchase->partner : $purchase;

        return match ($condition['path']) {
            'gender' => $user->gender,
            'marital' => $user->marital,
            'month' => (new SajuService())->month(),
            'year' => (int) Carbon::parse($purchase->users->birthed_at)->format('Y'),
            'day' => (int) Carbon::parse($purchase->created_at)->format('d'),
        };
    }

    public function today(User $user): string
    {
        $data = [
            'name' => $user->name,
            'gender' => $user->gender,
            'marital' => $user->marital,
            'birthed_at' => $user->birthed_at,
            'calendar' => $user->calendar,
        ];
        $saju = (new SajuApiService())->getSaju($data);

        $content = Content::where('name', '오늘의 한마디')->first();
        $content->increment('view_count');
        $fortuneId = $content->childrenData->first()->contentFortunes()->first()->id;

        $result = FortuneData::where([
            'fortune_id' => $fortuneId,
            'value1' => $saju['daejeongsu']['key']['day'],
            'value2' => $this->sajuService->month(),
        ])->first()->summary;

        if (! $result) {
            $result = FortuneData::where('fortune_id', $fortuneId)->first()->summary;
        }

        return $result;
    }
}
