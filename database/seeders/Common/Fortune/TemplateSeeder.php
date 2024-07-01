<?php

namespace Database\Seeders\Common\Fortune;

use App\Models\Fortune\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'name' => '한줄 요약',
                'template_name' => '한줄 요약',
            ], [
                'name' => '요약, 풀이',
                'template_summary' => '한줄 요약',
                'template_content' => '운세 풀이',
            ], [
                'name' => '운세 풀이',
                'template_content' => '운세 풀이',
            ], [
                'name' => '제목, 점수',
                'template_name' => '제목',
                'template_summary' => '점수',
            ], [
                'name' => '제목, 점수, 요약',
                'template_name' => '제목',
                'template_summary' => '점수',
                'template_content' => '요약',
            ], [
                'name' => '제목, 점수, 풀이',
                'template_name' => '제목',
                'template_summary' => '점수',
                'template_content' => '풀이',
            ], [
                'name' => '행운의 아이템',
                'template_name' => '제목',
                'template_content' => '아이템',
            ], [
                'name' => '그래프',
                'template_name' => '제목',
                'template_content' => '100',
            ],
        ];

        foreach ($templates as $template) {
            Template::firstOrCreate([
                'name' => $template['name'],
                'template_name' => $template['template_name'] ?? null,
                'template_summary' => $template['template_summary'] ?? null,
                'template_content' => $template['template_content'] ?? null,
            ]);
        }
    }
}
