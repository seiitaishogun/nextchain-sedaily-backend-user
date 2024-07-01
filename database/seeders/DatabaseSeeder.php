<?php

namespace Database\Seeders;

use App\Models\Content\Content;
use App\Models\File;
use App\Models\Fortune\Fortune;
use App\Models\User;
use Database\Seeders\Common\Content\CategorySeeder;
use Database\Seeders\Common\Content\ContentSeeder;
use Database\Seeders\Common\Fortune\Condition\SurveySeeder;
use Database\Seeders\Common\Fortune\ConditionSeeder;
use Database\Seeders\Common\Fortune\ConditionValue\SurveyDataSeeder;
use Database\Seeders\Common\Fortune\ConditionValueSeeder;
use Database\Seeders\Common\Fortune\TemplateSeeder;
use Database\Seeders\Common\TagSeeder;
use Database\Seeders\Common\TypeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 기초 데이터 추가 (php artisan db:seed --class=DatabaseSeeder)
     */
    public function run(): void
    {
        User::factory(1)->create();
        File::factory(3)->create();

        $this->call([
            // Common
            TagSeeder::class,
            TypeSeeder::class,
            CategorySeeder::class,

            // Content
            // ContentSeeder::class,
            ConditionSeeder::class,
            ConditionValueSeeder::class,
            TemplateSeeder::class,

            // Survey
            SurveySeeder::class,
            SurveyDataSeeder::class,
        ]);

        Content::factory(5)->create();
        Fortune::factory(10)->create();
    }
}
