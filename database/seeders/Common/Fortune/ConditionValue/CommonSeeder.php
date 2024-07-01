<?php

namespace Database\Seeders\Common\Fortune\ConditionValue;

use App\Models\Fortune\Condition;
use App\Models\Fortune\ConditionValue;
use Illuminate\Database\Seeder;

class CommonSeeder extends Seeder
{
    public function run(): void
    {
        $commons = [
            'gender' => [0, 1],
            'marital' => ['single', 'couple', 'married'],
            'month' => ['even', 'odd'],
            'lunar' => [
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16',
                '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31',
            ],
        ];

        foreach ($commons as $key => $values) {
            $conditionIds = Condition::whereNull('type_id')
                ->where('path', $key)
                ->pluck('id');

            foreach ($conditionIds as $conditionId) {
                foreach ($values as $value) {
                    ConditionValue::firstOrCreate([
                        'condition_id' => $conditionId,
                        'name' => $value,
                    ]);
                }
            }
        }

        unset($commons);
    }
}
