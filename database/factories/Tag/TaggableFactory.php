<?php

namespace Database\Factories\Tag;

use App\Models\Tag\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaggableFactory extends Factory
{
    public function definition(): array
    {
        $userCount = User::count();
        $tagCount = Tag::count();

        return [
            'tag_id' => fake()->numberBetween(1, $tagCount),
            'taggable_type' => fake()->randomElement(['App\Models\Content\Content']),
            'taggable_id' => fake()->numberBetween(1, $userCount),
        ];
    }
}
