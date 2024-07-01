<?php

namespace Database\Seeders\Common;

use App\Models\Tag\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = ['결혼', '연애', '취업', '학업', '재물', '건강', '직장', '자녀', '대인관계', '친구', '반려동물'];

        foreach ($tags as $tag) {
            Tag::firstOrCreate(['name' => $tag]);
        }
    }
}
