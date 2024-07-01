<?php

namespace Service\Fortune;

use App\Models\Content\ContentData;

class ConstellationService
{
    /**
     * 생년월일을 받아서 별자리(순서)를 리턴
     */
    public function getConstellation($birthedAt): int
    {
        $birth = (int) date('md', strtotime($birthedAt));

        $zodiac = null;
        if ($birth >= 120 && $birth <= 218) {
            $zodiac = 10;
        } elseif ($birth >= 219 && $birth <= 320) {
            $zodiac = 11;
        } elseif ($birth >= 321 && $birth <= 419) {
            $zodiac = 0;
        } elseif ($birth >= 420 && $birth <= 520) {
            $zodiac = 1;
        } elseif ($birth >= 521 && $birth <= 621) {
            $zodiac = 2;
        } elseif ($birth >= 622 && $birth <= 722) {
            $zodiac = 3;
        } elseif ($birth >= 723 && $birth <= 822) {
            $zodiac = 4;
        } elseif ($birth >= 823 && $birth <= 923) {
            $zodiac = 5;
        } elseif ($birth >= 924 && $birth <= 1022) {
            $zodiac = 6;
        } elseif ($birth >= 1023 && $birth <= 1122) {
            $zodiac = 7;
        } elseif ($birth >= 1123 && $birth <= 1224) {
            $zodiac = 8;
        } elseif ($birth >= 1225 || $birth <= 119) {
            $zodiac = 9;
        }

        return $zodiac;
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
}
