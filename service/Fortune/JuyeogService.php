<?php

namespace Service\Fortune;

use App\Models\Fortune\Gwae;

class JuyeogService
{
    /**
     * JuyeogService, index
     */
    public function getGwae($value): Gwae
    {
        $gwaes = explode(',', $value);

        return Gwae::where(['out' => $gwaes[0], 'in' => $gwaes[1]])->first();
    }
}
