<?php

namespace Database\Factories\Fortune;

use App\Models\Fortune\Fortune;
use App\Models\Fortune\FortuneData;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FortuneData>
 */
class FortuneDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // TODO : condition_values 를 이용하여 랜덤 텍스트로 생성

        return [
            'fortune_id' => fake()->numberBetween(1, Fortune::count()),
            'value1' => fake()->randomElement($data),
            'value2' => fake()->randomElement($data),
            'value3' => null,
            'value4' => null,

            'name' => fake()->sentence(),
            'contents' => fake()->text(),
        ];
    }
}
