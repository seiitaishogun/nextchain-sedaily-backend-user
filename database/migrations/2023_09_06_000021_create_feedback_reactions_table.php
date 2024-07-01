<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 컨텐츠 피드백
     */
    public function up(): void
    {
        Schema::create('feedback_reactions', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->comment('컨텐츠 id')->constrained();
            $table->foreignId('purchase_id')->unique()->comment('구매 id')->constrained();
            $table->foreignId('feedback_id')->comment('피드백 id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback_reactions');
    }
};
