<?php

namespace Database\Factories\Payment;

use App\Models\Content\Content;
use App\Models\Payment\Purchase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, User::count()),
            'content_id' => fake()->numberBetween(1, Content::count()),
            'parent_id' => null,
            'name' => fake()->name(),
            'gender' => fake()->boolean(),
            'marital' => fake()->randomElement(['single', 'couple ', 'married']),
            'birthed_at' => Carbon::now(),
            'calendar' => fake()->randomElement(['solar', 'lunar ', 'leap']),
            'daejeongsu' => fake()->randomNumber(4),
            'price' => fake()->randomNumber(),
            'is_favorite' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
