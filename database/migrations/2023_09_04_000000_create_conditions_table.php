<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 운세 조건 마이그레이션
     * ex) 연간, 월간, 일간, 시간, 연지, 월지, 일지, 시지 등
     */
    public function up(): void
    {
        Schema::create('conditions', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->nullable()->comment('분류')->constrained();
            $table->string('name')->unique()->comment('설명');
            $table->string('path')->comment('레거시 API 배열');
            $table->boolean('is_open')->default(1)->comment('사용 여부');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conditions');
    }
};
