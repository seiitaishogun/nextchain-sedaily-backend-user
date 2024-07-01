<?php

namespace Database\Factories\Content;

use App\Models\Content\ContentData;
use App\Models\Fortune\Fortune;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFortuneFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content_data_id' => fake()->numberBetween(1, ContentData::count()),
            'fortune_id' => fake()->numberBetween(1, Fortune::count()),
            'order' => fake()->randomNumber(),
        ];
    }
}
