<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 운세 풀이 데이터 마이그레이션
     */
    public function up(): void
    {
        Schema::create('fortunes', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->nullable()->comment('데이터 업로드')->constrained();
            $table->foreignId('template_id')->comment('템플릿')->constrained();
            $table->foreignId('type_id')->comment('분류')->constrained();

            $table->string('name')->comment('데이터 설명');
            $table->foreignId('condition1')->nullable()->comment('조건1')->constrained('conditions');
            $table->foreignId('condition2')->nullable()->comment('조건2')->constrained('conditions');
            $table->foreignId('condition3')->nullable()->comment('조건3')->constrained('conditions');
            $table->foreignId('condition4')->nullable()->comment('조건4')->constrained('conditions');

            $table->unsignedTinyInteger('status')->default(0)->comment(
                '0:normal, 1:(saju) partner, 2:(saju) couple, 3:(taro) normal, 4:(taro) only straight'
            );
            $table->boolean('is_open')->default(true)->comment('공개 여부 (사용 여부)');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fortunes');
    }
};
