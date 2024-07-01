<?php

namespace Database\Seeders\Common\Content;

use App\Models\Content\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            ['code' => 'TODAY2', 'name' => '오늘의 운세'],
            ['code' => 'TODAY1', 'name' => '오늘의 한마디'],
        ];

        foreach ($contents as $content) {
            Content::firstOrCreate([
                'user_id' => 1,
                'type_id' => 1,
                'code' => $content['code'],
                'name' => $content['name'],
                'price' => 0,
            ]);
        }
    }
}
