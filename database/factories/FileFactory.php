<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FileFactory extends Factory
{
    protected $model = File::class;

    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => fake()->word(),
            'path' => fake()->filePath(),
            'extension' => fake()->fileExtension(),
            'size' => fake()->numberBetween(100, 3000),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
