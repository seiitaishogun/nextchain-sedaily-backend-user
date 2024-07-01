<?php

return [
    /**
     * 응답 코드
     * 200~ 성공
     * 400~ 클라이언트 에러
     * 500~ 서버 에러
     * =============
     * 코드 지정 방식: status + .expression
     * ex) 402.lackCoin : 코인 부족
     */
    '200' => [
        'success' => '성공',
    ],
    // 클라이언트 에러
    // 정의되지 않은 요청
    '400' => [
        'process_error' => '비정상적인 코인 구매/적립/사용 요청',
    ],
    // 미인증
    '401' => [
        'authentication' => '로그인 필요',
    ],
    // 결제
    '402' => [
        'lack_coin' => '코인 부족',
    ],
    // 비인가
    '403' => [
        'content_expiration' => '만료된 컨텐츠',
        'coupon_expiration' => '만료된 쿠폰',
        'disagree' => '이용약관 미동의',
        'no_content' => '컨텐츠 없음',
        'purchase_error' => '구매 오류',
        'purchase_unavailable' => '구매 불가',
        'referrer' => '접근 제한된 사이트',
        'unauthorized' => '본인 인증 필요',
    ],
    // 리소스 없음
    '404' => [
        'unsupported' => '미지원 로그인 방식',
        'unauthorized' => '구매 유저가 아님', //@todo : 프론트와 상태값 작업 후 삭제 필요
    ],
    '409' => [
        'used_coupon' => '이미 사용한 쿠폰',
        'used_feedback' => '이미 남긴 구매 피드백',
    ],
    // 서버
    '500' => [
        'server' => '서버 에러',
        'hellounse' => '헬로우운세 API 에러',
        // OAuth
        'kakao' => '카카오 서버 에러',
        'apple' => '애플 서버 에러',
        // 제휴 광고
        'pincrux' => '핀크럭스 서버 에러',
    ],

];
