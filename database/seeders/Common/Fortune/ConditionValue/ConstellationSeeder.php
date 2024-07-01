<?php

namespace Database\Seeders\Common\Fortune\ConditionValue;

use App\Models\Fortune\Condition;
use App\Models\Fortune\ConditionValue;
use Illuminate\Database\Seeder;

class ConstellationSeeder extends Seeder
{
    public function run(): void
    {
        $constellations = [
            '양자리', '황소자리', '쌍둥이자리', '게자리', '사자자리', '처녀자리',
            '천칭자리', '전갈자리', '사수자리', '염소자리', '물병자리', '물고기자리',
        ];

        foreach ($constellations as $constellation) {
            ConditionValue::firstOrCreate([
                'condition_id' => Condition::where('path', 'constellation')->first()->id,
                'name' => $constellation,
            ]);
        }

        unset($constellations);
    }
}
