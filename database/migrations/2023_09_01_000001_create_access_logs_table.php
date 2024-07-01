<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 관리자 접속 로그
     */
    public function up(): void
    {
        Schema::create('access_logs', static function (Blueprint $table) {
            $table->id();
            // user_id
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('host', 255)->nullable()->comment('도메인');
            $table->string('httpHost', 255)->nullable()->comment('호스트');
            $table->string('path', 255)->nullable()->comment('경로');
            $table->string('referer', 255)->nullable()->comment('리퍼러');
            $table->string('agent', 500)->nullable()->comment('유저 에이전트');
            $table->ipAddress('ip')->nullable()->comment('IP 주소');
            $table->timestamp('last_accessed_at')->nullable()->comment('마지막 접속일');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access_logs');
    }
};
