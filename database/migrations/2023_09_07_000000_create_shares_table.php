<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 컨텐츠, 공유하기
     */
    public function up(): void
    {
        Schema::create('shares', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->nullable()->comment('구매');

            $table->string('code', 50)->comment('코드');
            $table->unsignedInteger('total_count')->nullable()->comment('전체 횟수');
            $table->unsignedInteger('used_count')->default(0)->comment('사용 횟수');
            $table->dateTime('started_at')->nullable()->comment('시작일');
            $table->dateTime('ended_at')->nullable()->comment('종료일');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shares');
    }
};
