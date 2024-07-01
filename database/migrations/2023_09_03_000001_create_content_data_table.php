<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 운세 컨텐츠, 운세 풀이 데이터 연결 정보 마이그레이션
     */
    public function up(): void
    {
        Schema::create('content_data', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->comment('컨텐츠')->constrained();
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('sign')->nullable()->comment('기호');
            $table->string('name')->comment('제목');
            $table->unsignedInteger('order')->default(0)->comment('순서');
            $table->boolean('is_open')->default(true)->comment('공개 여부');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_data');
    }
};
