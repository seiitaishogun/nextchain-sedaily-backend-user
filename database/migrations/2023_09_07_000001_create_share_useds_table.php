<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('share_useds', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('share_id')->comment('공유 id')->constrained();
            $table->string('host', 255)->nullable()->comment('호스트');
            $table->string('path', 255)->nullable()->comment('경로');
            $table->string('referer', 255)->nullable()->comment('리퍼러');
            $table->string('agent', 255)->nullable()->comment('유저 에이전트');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('share_useds');
    }
};
