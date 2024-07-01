<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 해당 조건의 값
     */
    public function up(): void
    {
        Schema::create('condition_values', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('condition_id')->nullable()->constrained();
            $table->string('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('condition_values');
    }
};
