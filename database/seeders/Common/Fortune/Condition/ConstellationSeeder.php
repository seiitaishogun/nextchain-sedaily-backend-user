<?php

namespace Database\Seeders\Common\Fortune\Condition;

use App\Models\Fortune\Condition;
use Illuminate\Database\Seeder;

class ConstellationSeeder extends Seeder
{
    public function run(): void
    {
        Condition::firstOrCreate([
            'type_id' => 6,
            'name' => '별자리',
            'path' => 'constellation',
        ]);
    }
}
