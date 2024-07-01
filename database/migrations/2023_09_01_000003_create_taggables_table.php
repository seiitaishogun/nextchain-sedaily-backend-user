<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 태그 다형성 마이그레이션
     */
    public function up(): void
    {
        Schema::create('taggables', static function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tag_id')->comment('해쉬태그 id');
            $table->morphs('taggable'); // Content
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('taggables');
    }
};
