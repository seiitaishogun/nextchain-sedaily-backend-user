<?php

namespace Database\Factories\Content;

use App\Models\Content\Content;
use App\Models\Content\ContentData;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentDataFactory extends Factory
{
    protected $model = ContentData::class;

    public function definition(): array
    {
        //TODO : 운세 풀이 데이터 확인 후 추가 작업 필요
        return [
            'content_id' => fake()->numberBetween(1, Content::count()),
            'parent_id' => fake()->numberBetween(1, ContentData::count()),
            'name' => fake()->word(),
            'is_open' => fake()->boolean(),
            'order' => fake()->numberBetween(0, 20),
        ];
    }
}
