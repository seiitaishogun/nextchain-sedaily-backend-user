<?php

namespace Database\Seeders\Common;

use App\Models\Content\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::firstOrCreate([
            ['name' => '많이 보는 테마'],
            ['name' => '무료체험'],
            ['name' => '사주/운세'],
            ['name' => '타로'],
            ['name' => '月운세'],
            ['name' => '2022년 운세'],
            ['name' => '전화상담'],
        ]);
    }
}
