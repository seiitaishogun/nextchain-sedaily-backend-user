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
        Schema::table('contents', function (Blueprint $table) {
            $table->unsignedInteger('discount_price')->nullable()->comment('할인가')->after('price');
            $table->unsignedInteger('discount_percent')->nullable()->comment('퍼센트')->after('price');
            $table->dateTime('discount_started_at')->nullable()->comment('할인 시작일')->after('price');
            $table->dateTime('discount_ended_at')->nullable()->comment('할인 종료일')->after('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropColumn('discount_price');
            $table->dropColumn('discount_percent');
            $table->dropColumn('discount_started_at');
            $table->dropColumn('discount_ended_at');
        });
    }
};
