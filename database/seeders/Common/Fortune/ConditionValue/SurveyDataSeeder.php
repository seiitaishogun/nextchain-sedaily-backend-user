<?php

namespace Database\Seeders\Common\Fortune\ConditionValue;

use App\Models\Fortune\Condition;
use App\Models\Fortune\ConditionValue;
use Illuminate\Database\Seeder;

class SurveyDataSeeder extends Seeder
{
    public function run(): void
    {
        $condition = [];
        for ($conditionLength = 1; $conditionLength < 6; $conditionLength++) {
            $condition[$conditionLength] = Condition::where('name', '질문'.$conditionLength)->first()->id;
        }

        for ($length = 1; $length < 6; $length++) {
            $number = str_repeat('1', $length); // 초기 숫자 생성
            $maxNumber = str_repeat('4', $length); // 최대 숫자 생성

            while ($number <= $maxNumber) {
                ConditionValue::firstorCreate([
                    'condition_id' => $condition[$length],
                    'name' => $number,
                ]);

                $carry = true; // 다음 수를 올릴지 여부

                for ($i = $length - 1; $i >= 0; $i--) {
                    if ($carry) {
                        $digit = (int) $number[$i] + 1;
                        if ($digit > 4) {
                            $number[$i] = '1';
                            $carry = true;
                        } else {
                            $number[$i] = (string) $digit;
                            $carry = false;
                        }
                    }
                }

                if ($carry) {
                    break; // 최대 숫자까지 도달하면 종료
                }
            }
        }

        unset($condition, $number, $maxNumber, $carry);
    }
}
