<?php

namespace Service\Fortune;

use App\Models\Content\ContentData;
use Illuminate\Support\Carbon;

class SibijisinService
{
    /**
     * 생년월일을 받아서 십이지신(순서)을 리턴
     */
    public function getSibijisin($birthedAt): int
    {
        $return = null;
        if ($birthedAt) {
            $birthYear = Carbon::parse($birthedAt)->format('Y');
            $sibijisin = [8, 9, 10, 11, 0, 1, 2, 3, 4, 5, 6, 7];
            //'원숭이','닭','개','돼지','쥐','소','호랑이','토끼','용','뱀','말','양'
            $return = $sibijisin[$birthYear % 12];
        }

        return $return;
    }

    public function getZodiac($condition, $parentId)
    {
        $order = ContentData::find($parentId)->order;

        $animal = [
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

        return match ($condition['path']) {
            'sibijisin' => $animal[$order],
            'sibijisin_number' => (new SajuApiService())->getSibijisinNumber()['sibijisin'][$order],
        };
    }
}
