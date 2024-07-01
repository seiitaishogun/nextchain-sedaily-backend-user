<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 운세 카테고리 마이그레이션
     * ex 무료 체험, 사주/운세, 타로, 월간 운세, 연간 운세
     */
    public function up(): void
    {
        Schema::create('categories', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('분류');
            $table->unsignedTinyInteger('status')->default(0)->comment('상태');
            $table->unsignedTinyInteger('order')->default(0)->comment('순서');
            $table->boolean('is_open')->default(true)->comment('공개 여부');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
