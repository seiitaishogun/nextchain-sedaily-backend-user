<?php

namespace Database\Seeders\Common\Fortune\Condition;

use App\Models\Fortune\Condition;
use Illuminate\Database\Seeder;

class TarotSeeder extends Seeder
{
    public function run(): void
    {
        Condition::firstOrCreate([
            'type_id' => 4,
            'name' => '타로',
            'path' => 'tarot',
        ]);
    }
}
