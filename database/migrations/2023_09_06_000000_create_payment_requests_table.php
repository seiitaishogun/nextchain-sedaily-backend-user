<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 결제 정보(나이스페이), 결제 모듈 반환값
     * https://developers.nicepay.co.kr/
     */
    public function up(): void
    {
        Schema::create('payment_requests', static function (Blueprint $table) {
            $table->id();

            $table->string('payMethod')->nullable();
            $table->string('goodsName')->nullable();
            $table->string('amt')->nullable();
            $table->string('mid')->nullable();
            $table->string('moid')->nullable();
            $table->string('buyerName')->nullable();
            $table->string('buyerEmail')->nullable();
            $table->string('buyerTel')->nullable();
            $table->string('returnURL')->nullable();
            $table->string('vbankExpDate')->nullable();
            $table->string('npLang')->nullable();
            $table->string('goodsCl')->nullable();
            $table->string('transType')->nullable();
            $table->string('charSet')->nullable();
            $table->string('reqReserved', 500)->nullable();
            $table->string('ediDate')->nullable();
            $table->string('signData')->nullable();
            $table->string('verifySType')->nullable();
            $table->string('encGoodsName')->nullable();
            $table->string('encBuyerName')->nullable();
            $table->string('npDirectYn')->nullable();
            $table->string('npDirectLayer')->nullable();
            $table->string('jsVer')->nullable();
            $table->string('npSvcType')->nullable();
            $table->string('deployedVer')->nullable();
            $table->string('deployedDate')->nullable();
            $table->string('deployedFileName')->nullable();
            $table->string('encVbankAccountName')->nullable();
            $table->string('authResultCode')->nullable();
            $table->string('authResultMsg')->nullable();
            $table->string('authToken')->nullable();
            $table->string('TxTid')->nullable();
            $table->string('nextAppURL')->nullable();
            $table->string('netCancelURL')->nullable();
            $table->string('signature')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_requests');
    }
};
