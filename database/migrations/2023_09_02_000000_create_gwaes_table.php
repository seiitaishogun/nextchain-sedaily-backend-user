<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 사주 관련 정보 : 괘
     */
    public function up(): void
    {
        Schema::create('gwaes', static function (Blueprint $table) {
            $table->id();
            $table->integer('out')->comment('외괘 (상괘)');
            $table->integer('in')->comment('내괘 (하괘)');
            $table->string('name');
            $table->string('contents')->comment('괘 내용');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gwaes');
    }
};
