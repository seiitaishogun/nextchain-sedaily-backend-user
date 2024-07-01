<?php

namespace Database\Seeders\Common\Fortune;

use Database\Seeders\Common\Fortune\ConditionValue\CommonSeeder;
use Database\Seeders\Common\Fortune\ConditionValue\ConstellationSeeder;
use Database\Seeders\Common\Fortune\ConditionValue\GwaeSeeder;
use Database\Seeders\Common\Fortune\ConditionValue\SajuSeeder;
use Database\Seeders\Common\Fortune\ConditionValue\TarotSeeder;
use Database\Seeders\Common\Fortune\ConditionValue\ZodiacSeeder;
use Illuminate\Database\Seeder;

class ConditionValueSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SajuSeeder::class,
            GwaeSeeder::class,
            TarotSeeder::class,
            ZodiacSeeder::class,
            ConstellationSeeder::class,
            CommonSeeder::class,
        ]);
    }
}
