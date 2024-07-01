<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 결제 정보(나이스페이) 마이그레이션
     * https://developers.nicepay.co.kr/
     */
    public function up(): void
    {
        Schema::create('payments', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_request_id')->constrained()->cascadeOnDelete();

            // 결제통보 파라미터 (공통)
            $table->string('resultCode', 4)->nullable()->comment('결과코드');
            $table->string('resultMsg', 100)->nullable()->comment('결과메세지');
            $table->string('msgSource')->nullable()->comment('소스');
            $table->unsignedInteger('amt')->comment('상품금액 (예시: 1000)');
            $table->string('mid', 10)->nullable()->comment('상점아이디');
            $table->string('moid', 64)->nullable()->comment('주문번호');
            $table->string('buyerEmail', 60)->nullable()->comment('구매자 e-mail');
            $table->string('buyerTel', 20)->nullable()->comment('구매자 전화번호');
            $table->string('buyerName', 50)->nullable()->comment('구매자명');
            $table->string('buyerAuthNum', 15)->nullable()->comment('구매자 식별번호');
            $table->string('mallUserID', 20)->nullable()->comment('고객 ID');
            $table->string('goodsName', 40)->nullable()->comment('상품명');
            $table->string('tid', 30)->nullable()->comment('거래ID');
            $table->string('authCode', 30)->nullable()->comment('승인번호');
            $table->string('authDate', 12)->nullable()->comment('승인일시 (YYMMDDHHMISS)');
            $table->string('payMethod', 10)->nullable()->comment('지불수단');
            $table->string('signature', 100)->nullable()->comment('결제통보 전문 hash값');
            $table->string('mallReserved', 500)->nullable()->comment('가맹점 여분필드');
            $table->string('mallReserved1', 10)->nullable()->comment('사업자번호');
            $table->string('fnCd', 4)->nullable()->comment('제휴사코드');
            $table->string('fnName', 20)->nullable()->comment('제휴사명');
            $table->string('cartData')->nullable()->comment('상품정보');

            // 현금영수증
            $table->string('rcptType')->nullable()->comment('현금영수증 타입 (미발행: 0 / 소득공제: 1 / 지출증빙: 2)');
            $table->string('rcptTID', 30)->nullable()->comment('현금영수증 TID');
            $table->string('rcptAuthCode', 30)->nullable()->comment('현금영수증 승인번호');

            // 결제통보 파라미터 (신용카드)
            $table->string('SUB_ID', 1)->nullable()->comment('서브 아이디');
            $table->string('cardCode', 4)->nullable()->comment('카드사 코드');
            $table->string('cardType', 4)->nullable()->comment('카드사 코드');
            $table->string('cardName', 20)->nullable()->comment('카드사명');
            $table->string('cardData', 100)->nullable()->comment('카드사 전달 데이터');
            $table->string('cardNo', 16)->nullable()->comment('카드번호 (예시: 12345678****1234');
            $table->string('cardQuota', 30)->nullable()->comment('할부개월');
            $table->string('cardInterest', 30)->nullable()->comment('무이자할부 여부');
            $table->string('cardCl', 2)->nullable()->comment('카드구분');
            $table->string('acquCardCode', 3)->nullable()->comment('카드 매입사 코드');
            $table->string('acquCardName', 20)->nullable()->comment('카드 매입사명');
            $table->string('multiCardAcquAmt')->nullable()->comment('복합결제 카드 매입사별 금액');

            // 결제통보 파라미터 (가상계좌)
            $table->string('vbankInputName', 20)->nullable()->comment('가상계좌 입금자명');
            $table->string('vbankName', 20)->nullable()->comment('가상계좌 은행명');
            $table->string('vbankNum', 20)->nullable()->comment('가상계좌 번호');

            // 할인
            $table->string('couponAmt')->nullable()->comment('쿠폰할인금액');
            $table->string('couponMinAmt')->nullable()->comment('쿠폰최소금액');
            $table->string('pointAmt')->nullable()->comment('포인트적립금액');
            $table->string('pointAppAmt')->nullable()->comment('포인트사용금액');
            $table->string('multiPointAmt')->nullable()->comment('복합결제 포인트 사용금액');
            $table->string('multiCouponAmt')->nullable()->comment('복합결제 쿠폰 사용금액');

            // 상태
            $table->string('clickpayCl', 2)->nullable()->comment('간편결제구분');
            $table->string('multiCl', 2)->nullable()->comment('복합결제구분');
            $table->string('ccPartCl', 2)->nullable()->comment('부분취소 가능여부');
            $table->string('termNo', 20)->nullable()->comment('CATID(단말기를 사용하는 MID에 한하여 응답값 존재)');
            $table->string('ediNo', 20)->nullable()->comment('전문관리항목(단말기를 사용하는 MID 중 단말기(온/오프) 거래에 한하여 응답값 존재');
            $table->string('stateCd')->nullable()->comment('거래 상태 (승인: 0, 전취소: 1, 후취소: 2)');
            $table->string('cancelDate', 12)->nullable()->comment('취소일시 (YYMMDDHHMISS)');
            $table->string('cancelMOID', 64)->nullable()->comment('취소요청 주문번호');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
