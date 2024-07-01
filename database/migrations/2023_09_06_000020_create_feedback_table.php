<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 컨텐츠 구매, 피드백
     */
    public function up(): void
    {
        Schema::create('feedback', static function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('리액션 이름');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
