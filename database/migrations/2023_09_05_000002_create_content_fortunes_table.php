<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 컨텐츠 데이터, 운세 풀이 데이터 연결 마이그레이션
     */
    public function up(): void
    {
        Schema::create('content_fortunes', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_data_id')->comment('컨텐츠 데이터')->constrained('content_data');
            $table->foreignId('fortune_id')->comment('운세 풀이 데이터')->constrained();
            $table->unsignedInteger('order')->default(0)->comment('순서');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_fortunes');
    }
};
