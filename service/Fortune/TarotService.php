<?php

namespace Service\Fortune;

use App\Models\Content\ContentData;

class TarotService
{
    /**
     * 순서에 따라 뽑은 타로 카드 반환
     */
    public function getTarot($values, int $parentId): string
    {
        $order = ContentData::find($parentId)->order;

        return explode(',', $values)[$order];
    }
}
