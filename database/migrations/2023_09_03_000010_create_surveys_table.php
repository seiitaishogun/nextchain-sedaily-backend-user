<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 컨텐츠, 설문
     */
    public function up(): void
    {
        Schema::create('surveys', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->nullable()->comment('컨텐츠 id')->constrained();
            $table->string('name', 50)->comment('설문 제목');
            $table->unsignedTinyInteger('total_count')->comment('질문 갯수');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
