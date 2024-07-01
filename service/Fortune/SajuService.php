<?php

namespace Service\Fortune;

use App\Models\Fortune\Manse;
use App\Models\Payment\Purchase;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SajuService
{
    public function getPurchaseSaju(Purchase $purchase): array
    {
        $saju[0] = (new SajuApiService())->getSaju($purchase);
        $resource[0] = $this->sajuPalja($saju[0]);
        if ($purchase->partner) {
            $saju[1] = (new SajuApiService())->getSaju($purchase->partner);
            $resource[1] = $this->sajuPalja($saju[1]);
        }

        return $resource;
    }

    /**
     * 사주 팔자 & 대운
     */
    private function sajuPalja($saju): array
    {
        // 사주 팔자
        foreach ($saju['cheongan'] as $ju) {
            $result['cheongan'][] = [
                $ju['sibgan'],
                $ju['eumyang'],
                $ju['ohaeng'],
                $ju['sibsin'],
            ];
        }
        foreach ($saju['jiji'] as $ju) {
            $result['jiji'][] = [
                $ju['sibiji'],
                $ju['eumyang'],
                $ju['ohaeng'],
                $ju['sibsin'],
            ];
        }

        // 대운
        $daeun = $saju['daeun'];
        $result['daeun']['name'] = '대운 - '.$daeun['order'].' 제'.$daeun['daeunsu'].'운';

        foreach (array_reverse($daeun['ganji']) as $ganji) {
            $result['daeun']['gan'][] = Str::substr($ganji, 0, 1);
            $result['daeun']['ji'][] = Str::substr($ganji, 1, 1);
        }

        for ($i = 0; $i < 8; $i++) {
            $result['daeun']['age'][] = ($daeun['daeunsu'] + $i * 10).'세';
        }

        return $result;
    }

    /**
     * 사주 조건값. 사주 배열을 받아서 조건의 path에 따라 값 반환
     */
    public function getSaju($condition, $saju, $data): string
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
     * 대정수(4자리)를 해석하여 괘(2자리)를 구함
     */
    public function gwae(int $daejeongsu): int
    {
        $gwae = mb_str_split($daejeongsu);

        if ($gwae[0] === '0') { // 0999
            abort(500, __('error.500.server'));
        }

        if ($gwae[1] === '0') { // 9099
            $gwae[1] = $gwae[0];
        }

        if ($gwae[2] === '0') { // 9900 & 9909
            if ($gwae[3] === '0') { // 9900
                $gwae[2] = $gwae[0];
            } else { // 9909
                $gwae[2] = $gwae[3];
            }
        }

        // TODO: 괘 결과가 9인 경우 8로 변환. 추후 수정 필요
        if ($gwae[1] === '9') {
            $gwae[1] = '8';
        }

        if ($gwae[2] === '9') {
            $gwae[2] = '8';
        }

        return $gwae[1].$gwae[2];
    }

    /**
     * 순서 -> 십이지신
     *
     * @param  int  $order  순서
     */
    public function sibijisin(int $order): string
    {
        $sibijisin = [
            0 => '자',
            1 => '축',
            2 => '인',
            3 => '묘',
            4 => '진',
            5 => '사',
            6 => '오',
            7 => '미',
            8 => '신',
            9 => '유',
            10 => '술',
            11 => '해',
        ];

        return $sibijisin[$order];
    }

    /**
     * 십신 -> 육친
     *
     * @param  string  $sibsin  십신
     */
    public function yugchin(string $sibsin): string
    {
        return match ($sibsin) {
            '비견', '겁재' => '비겁',
            '식신', '상관' => '식상',
            '편재', '정재' => '재성',
            '편관', '정관' => '관성',
            '편인', '정인' => '인성',
            default => $sibsin,
        };
    }

    /**
     * 현재 시간(양력 날짜)을 입력받아 음력(만세력)으로 변환하고 홀짝 구분
     */
    public function month(): string
    {
        // @todo manses 테이블 수정 후 삭제
        $now = Carbon::parse()->format('Y-m-d');
        $manse = Manse::where('solar_date', $now)->first();
        if (! $manse->lunar_month) {
            $month = Carbon::parse($manse->lunar_date)->format('m');

            return $month % 2 === 0 ? 'even' : 'odd';
        }

        return Manse::where('solar_date', now()->format('Y-m-d'))->value('lunar_month') % 2 === 0 ? 'even' : 'odd';
    }
}
