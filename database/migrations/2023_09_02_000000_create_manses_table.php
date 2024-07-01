<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 사주 관련 정보 : 만세력
     */
    public function up(): void
    {
        Schema::create('manses', static function (Blueprint $table) {
            $table->id();
            $table->string('solar_date')->comment('양력');
            $table->string('lunar_date')->comment('음력');
            $table->boolean('is_leap')->default(false)->comment('윤달 여부');
            $table->string('summer_time')->nullable()->comment('시간');
            $table->string('year')->comment('년');
            $table->string('month')->comment('월');
            $table->string('day')->comment('일');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manses');
    }
};
