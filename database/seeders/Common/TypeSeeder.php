<?php

namespace Database\Seeders\Common;

use App\Models\Content\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'today', 'description' => '오늘의 운세', 'is_skip' => true],
            ['name' => 'saju', 'description' => '사주', 'is_skip' => false],
            ['name' => 'juyeog', 'description' => '주역', 'is_skip' => false],
            ['name' => 'tarot', 'description' => '타로', 'is_skip' => false],
            ['name' => 'zodiac', 'description' => '띠별 운세', 'is_skip' => true],
            ['name' => 'constellation', 'description' => '별자리 운세', 'is_skip' => true],
        ];

        foreach ($types as $type) {
            Type::firstOrCreate([
                'name' => $type['name'],
                'description' => $type['description'],
                'is_skip' => $type['is_skip'],
            ]);
        }
    }
}
