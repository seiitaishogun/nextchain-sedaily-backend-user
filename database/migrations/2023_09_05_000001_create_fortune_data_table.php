<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 운세 풀이 데이터, 업로드 데이터 정보 마이그레이션
     */
    public function up(): void
    {
        Schema::create('fortune_data', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('fortune_id')->constrained();

            $table->string('value1')->nullable()->comment('값1'); // 음, 양
            $table->string('value2')->nullable()->comment('값2');
            $table->string('value3')->nullable()->comment('값3');
            $table->string('value4')->nullable()->comment('값4');

            $table->string('name')->nullable()->comment('제목 (요약)');
            $table->text('summary')->nullable()->comment('내용 (요약)');
            $table->text('contents')->nullable()->comment('내용 (풀이)');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fortune_data');
    }
};
