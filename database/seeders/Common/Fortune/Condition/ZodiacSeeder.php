<?php

namespace Database\Seeders\Common\Fortune\Condition;

use App\Models\Fortune\Condition;
use Illuminate\Database\Seeder;

class ZodiacSeeder extends Seeder
{
    public function run(): void
    {
        $zodiacs = [
            [
                'type_id' => 5,
                'name' => '십이지신',
                'path' => 'sibijisin',
            ], [
                'type_id' => 5,
                'name' => '십이지신 번호',
                'path' => 'sibijisin_number',
            ],
        ];

        foreach ($zodiacs as $zodiac) {
            Condition::firstOrCreate([
                'type_id' => $zodiac['type_id'],
                'name' => $zodiac['name'],
                'path' => $zodiac['path'],
            ]);
        }

        unset($zodiacs);
    }
}
