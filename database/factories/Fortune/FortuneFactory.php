<?php

namespace Database\Factories\Fortune;

use App\Models\Content\Type;
use App\Models\Fortune\Condition;
use App\Models\Fortune\Template;
use Illuminate\Database\Eloquent\Factories\Factory;

class FortuneFactory extends Factory
{
    public function definition(): array
    {
        $templateId = fake()->numberBetween(1, Template::count());
        $typeId = fake()->numberBetween(1, Type::count());
        $conditions = Condition::where('type_id', $typeId)->pluck('id');

        $count = min(count($conditions), 4);
        if ($count === 0) {
            $conditions = [null];
        }

        return [
            'template_id' => $templateId,
            'type_id' => $typeId,

            'condition1' => $count > 0 ? $conditions->random() : null,
            'condition2' => $count > 1 ? $conditions->random() : null,
            'condition3' => $count > 2 ? $conditions->random() : null,
            'condition4' => $count > 3 ? $conditions->random() : null,

            'name' => '테스트 운세'.fake()->unique()->randomNumber(2),
            'is_open' => fake()->boolean(),
        ];
    }
}
