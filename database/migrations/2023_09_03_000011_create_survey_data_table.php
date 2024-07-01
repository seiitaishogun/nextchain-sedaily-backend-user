<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 컨텐츠, 설문 정보
     */
    public function up(): void
    {
        Schema::create('survey_data', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->nullable()->comment('컨텐츠 id')->constrained();
            $table->foreignId('survey_id')->comment('설문 id')->constrained();
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('name')->comment('질문,답변');
            $table->unsignedInteger('order')->default(0)->comment('순서');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_data');
    }
};
