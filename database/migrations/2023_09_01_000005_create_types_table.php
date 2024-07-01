<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 운세 분류 마이그레이션
     * ex 사주, 궁합, 띠별 운세, 주역 운세
     */
    public function up(): void
    {
        Schema::create('types', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('운세_분류');
            $table->string('description')->nullable()->unique()->comment('운세_분류_한글');
            $table->boolean('is_skip')->default(false)->comment('사주 정보 입력 생략 여부');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
