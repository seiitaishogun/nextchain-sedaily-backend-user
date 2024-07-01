<?php

namespace Database\Seeders\Common\Fortune\ConditionValue;

use App\Models\Fortune\Condition;
use App\Models\Fortune\ConditionValue;
use Illuminate\Database\Seeder;

class TarotSeeder extends Seeder
{
    public function run(): void
    {
        $conditionId = Condition::where('name', '타로')->first()->id;

        for ($card = 1; $card < 23; $card++) {
            // 타로 카드 1~22
            for ($direction = 0; $direction < 2; $direction++) {
                // 타로 카드 방향 0: 정방향(straight), 1: 역방향(reverse)
                ConditionValue::firstOrCreate([
                    'condition_id' => $conditionId,
                    'name' => $card.($direction === 0 ? 's' : 'r'),
                ]);
            }
        }
    }
}
