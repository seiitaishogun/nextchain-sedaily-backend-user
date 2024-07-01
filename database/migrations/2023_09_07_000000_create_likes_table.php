<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 컨텐츠, 좋아요
     */
    public function up(): void
    {
        Schema::create('likes', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->constrained();
            $table->string('referer', 255)->nullable()->comment('리퍼러');
            $table->string('agent', 500)->nullable()->comment('유저 에이전트');
            $table->ipAddress('ip')->nullable()->comment('IP 주소');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
