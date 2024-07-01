<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 메인 배너
     */
    public function up(): void
    {
        Schema::create('banners', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->comment('업로드 파일')->constrained();
            $table->string('name')->comment('배너 이름');
            $table->string('link')->nullable()->comment('배너 링크');
            $table->string('type')->nullable()->comment('top: 상단, bottom: 하단');

            $table->boolean('is_open')->default(true)->comment('배너 공개 여부');
            $table->dateTime('started_at')->nullable()->comment('노출 시작일');
            $table->dateTime('ended_at')->nullable()->comment('노출 종료일');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
