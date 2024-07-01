<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 태그 마이그레이션
     */
    public function up(): void
    {
        Schema::create('tags', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('해쉬태그 이름');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
