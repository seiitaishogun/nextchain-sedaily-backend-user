<?php

namespace Database\Seeders\Common\Fortune\Condition;

use App\Models\Fortune\Condition;
use Illuminate\Database\Seeder;

class CommonSeeder extends Seeder
{
    public function run(): void
    {
        $commons = [
            [
                'name' => '성별',
                'path' => 'gender',
            ], [
                'name' => '결혼',
                'path' => 'marital',
            ], [
                'name' => '현재월-홀짝',
                'path' => 'month',
            ], [
                'name' => '음력',
                'path' => 'lunar',
            ], [
                'name' => '기타',
                'path' => 'etc',
            ],
        ];

        foreach ($commons as $common) {
            Condition::firstOrCreate([
                'name' => $common['name'],
                'path' => $common['path'],
            ]);
        }

        unset($commons);
    }
}
