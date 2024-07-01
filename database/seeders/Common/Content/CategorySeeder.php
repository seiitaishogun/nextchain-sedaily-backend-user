<?php

namespace Database\Seeders\Common\Content;

use App\Models\Content\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['많이 보는 테마', '무료체험', '사주/운세', '타로', '月운세', '2022년 운세', '전화상담'];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }
    }
}
