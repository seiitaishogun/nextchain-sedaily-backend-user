<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 운세 템플릿 마이그레이션
     */
    public function up(): void
    {
        Schema::create('templates', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->nullable()->comment('템플릿 파일')->constrained();
            $table->string('name')->unique()->comment('템플릿명');
            $table->string('template_name')->nullable()->comment('템플릿 출력 데이터, 제목');
            $table->text('template_summary')->nullable()->comment('템플릿 출력 데이터, 요약');
            $table->text('template_content')->nullable()->comment('템플릿 출력 데이터, 내용');
            $table->boolean('is_open')->default(true)->comment('공개 여부');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
