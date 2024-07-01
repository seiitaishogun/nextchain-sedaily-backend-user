<?php

namespace Database\Seeders\Common\Fortune;

use Database\Seeders\Common\Fortune\Condition\CommonSeeder;
use Database\Seeders\Common\Fortune\Condition\ConstellationSeeder;
use Database\Seeders\Common\Fortune\Condition\JuyeogSeeder;
use Database\Seeders\Common\Fortune\Condition\SajuSeeder;
use Database\Seeders\Common\Fortune\Condition\TarotSeeder;
use Database\Seeders\Common\Fortune\Condition\ZodiacSeeder;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SajuSeeder::class,
            JuyeogSeeder::class,
            TarotSeeder::class,
            ZodiacSeeder::class,
            ConstellationSeeder::class,
            CommonSeeder::class,
        ]);
    }
}
