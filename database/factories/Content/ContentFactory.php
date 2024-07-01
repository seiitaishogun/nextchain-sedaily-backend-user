<?php

namespace Database\Factories\Content;

use App\Models\Content\Category;
use App\Models\Content\Content;
use App\Models\Content\Type;
use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContentFactory extends Factory
{
    protected $model = Content::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, User::count()),
            'category_id' => fake()->numberBetween(1, Category::count()),
            'type_id' => fake()->numberBetween(1, Type::count()),

            'banner_id' => fake()->numberBetween(1, File::count()),
            'banner_text_id' => fake()->numberBetween(1, File::count()),
            'thumbnail_id' => fake()->numberBetween(1, File::count()),
            'thumbnail_large_id' => fake()->numberBetween(1, File::count()),

            'code' => 'OR'.fake()->unique()->numberBetween(1, 999),
            'name' => '컨텐츠-'.fake()->unique()->randomNumber(1),
            'summary' => '컨텐츠 요약-'.fake()->word(),
            'contents' => '컨텐츠 상세-'.fake()->text(),
            'price' => fake()->numberBetween(1000, 50000),
            'open_status' => fake()->numberBetween(0, 2),
            'is_new' => fake()->boolean(),
            'is_hot' => fake()->boolean(),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
