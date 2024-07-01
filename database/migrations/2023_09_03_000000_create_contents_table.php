<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 운세 컨텐츠 마이그레이션
     */
    public function up(): void
    {
        Schema::create('contents', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('작성자')->constrained();
            $table->foreignId('category_id')->nullable()->comment('운세 카테고리')->constrained();
            $table->foreignId('type_id')->comment('운세 분류')->constrained();

            $table->foreignId('banner_id')->nullable()->comment('상단 배너')->constrained('files');
            $table->foreignId('banner_text_id')->nullable()->comment('상단 배너 텍스트')->constrained('files');
            $table->foreignId('thumbnail_id')->nullable()->comment('썸네일')->constrained('files');
            $table->foreignId('thumbnail_large_id')->nullable()->comment('썸네일 대형')->constrained('files');
            $table->foreignId('sample_id')->nullable()->comment('예시보기 이미지')->constrained('files');
            $table->foreignId('sample_mobile_id')->nullable()->comment('예시보기 모바일 이미지')->constrained('files');

            $table->string('code')->unique()->comment('컨텐츠 코드');
            $table->string('name')->comment('컨텐츠 제목');
            $table->string('summary')->nullable()->comment('컨텐츠 소개');
            $table->text('contents')->nullable()->comment('컨텐츠 내용');

            $table->unsignedInteger('price')->comment('가격');
            $table->unsignedSmallInteger('open_status')->default(1)->comment('0:unused(미사용), 1:public(공개), 2:private(노출 제한)');
            $table->boolean('is_new')->default(true)->comment('신규 여부');
            $table->boolean('is_hot')->default(true)->comment('상태 여부');

            $table->unsignedInteger('view_count')->default(0)->comment('조회수');
            $table->unsignedInteger('like_count')->default(0)->comment('좋아요 수');
            $table->unsignedInteger('sales_count')->default(0)->comment('판매량');
            $table->unsignedInteger('share_count')->default(0)->comment('공유 횟수');

            $table->unsignedInteger('available_time')->default(72)->comment('다시보기 시간');
            $table->dateTime('visible_started_at')->default('2023-01-01 00:00:00')->nullable();
            $table->dateTime('visible_ended_at')->default('2030-01-01 00:00:00')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
