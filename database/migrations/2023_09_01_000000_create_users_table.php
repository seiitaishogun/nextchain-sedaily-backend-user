<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 관리자 마이그레이션
     */
    public function up(): void
    {
        Schema::create('users', static function (Blueprint $table) {
            $table->id();
            $table->string('email', 200)->unique()->comment('이메일');
            $table->string('password')->comment('비밀번호');
            $table->string('name', 20)->nullable()->comment('이름');
            $table->string('type', 20)->default('borra')->comment('관리자 종류');
            $table->boolean('is_admin')->default(false)->comment('관리자 여부');
            $table->string('refresh_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->dateTime('last_accessed_at')->default(now())->comment('최종 접속일');
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
