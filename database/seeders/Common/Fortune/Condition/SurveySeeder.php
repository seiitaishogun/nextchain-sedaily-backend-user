<?php

namespace Database\Seeders\Common\Fortune\Condition;

use App\Models\Fortune\Condition;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    public function run(): void
    {
        for ($count = 1; $count < 6; $count++) {
            Condition::firstOrCreate([
                'name' => '질문'.$count,
                'path' => 'survey',
            ]);
        }
    }
}
