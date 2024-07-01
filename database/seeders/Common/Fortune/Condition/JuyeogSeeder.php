<?php

namespace Database\Seeders\Common\Fortune\Condition;

use App\Models\Fortune\Condition;
use Illuminate\Database\Seeder;

class JuyeogSeeder extends Seeder
{
    public function run(): void
    {
        Condition::firstOrCreate([
            'type_id' => 3,
            'name' => '괘',
            'path' => 'gwae',
        ]);
    }
}
