<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 파일 마이그레이션
     */
    public function up(): void
    {
        Schema::create('files', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('업로드 유저')->constrained();
            $table->string('name')->comment('원본 파일명');
            $table->string('path')->comment('파일 경로');
            $table->string('extension')->nullable()->comment('확장자');
            $table->unsignedInteger('size')->default(0)->comment('파일 크기');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
