<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 운세 구매 마이그레이션
     */
    public function up(): void
    {
        Schema::create('purchases', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->constrained();
            $table->foreignId('payment_id')->nullable()->constrained();
            $table->unsignedInteger('parent_id')->nullable()->comment('궁합 상대 정보 (null: 본인)');
            $table->string('purchase_name', 20)->nullable()->comment('구매자 이름');
            $table->string('phone', 15)->nullable()->comment('휴대폰 번호');
            $table->string('password')->nullable()->comment('비밀번호');

            $table->string('name', 20)->comment('이름');
            $table->boolean('gender')->comment('0:남자, 1:여자');
            $table->enum('marital', ['single', 'couple ', 'married'])->comment('1:미혼, 2:미혼(커플), 3:기혼');
            $table->dateTime('birthed_at')->comment('태어난 시각');
            $table->boolean('is_birthed_time')->default(1)->comment('0:unknown, 1:known(use birthed_at)');
            $table->enum('calendar', ['solar', 'lunar ', 'leap'])->comment('양력, 음력, 윤달');
            $table->string('value')->nullable()->comment('타로,주역 값');
            $table->string('survey_value')->nullable()->comment('설문 결과 (미사용)');
            $table->dateTime('available_at')->nullable()->comment('다시보기 기간');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
