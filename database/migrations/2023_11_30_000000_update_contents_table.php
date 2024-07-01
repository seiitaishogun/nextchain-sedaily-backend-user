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
        Schema::table('contents', static function (Blueprint $table) {
            $table->foreignId('banner_mobile_id')->nullable()->after('banner_id')
                ->comment('상단 모바일 배너')->constrained('files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contents', static function (Blueprint $table) {
            $table->dropColumn('banner_mobile_id');
        });
    }
};
