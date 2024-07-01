<?php

namespace Service\Fortune;

use App\Models\Payment\Purchase;

class JamidusuService
{
    public const CHEONGAN = [
        '갑', '을', '병', '정', '무', '기', '경', '신', '임', '계',
        '갑', '을', '병', '정', '무', '기', '경', '신', '임', '계',
        '갑', '을', '병', '정', '무', '기', '경', '신', '임', '계',
    ];

    public const JIJI = [
        '자', '축', '인', '묘', '진', '사', '오', '미', '신', '유', '술', '해',
        '자', '축', '인', '묘', '진', '사', '오', '미', '신', '유', '술', '해',
        '자', '축', '인', '묘', '진', '사', '오', '미', '신', '유', '술', '해',
    ];

    public const GUNG = [
        '명', '부모', '복덕', '주거', '진로', '대인', '대외', '건강', '금전', '자녀', '부부', '형제',
        '명', '부모', '복덕', '주거', '진로', '대인', '대외', '건강', '금전', '자녀', '부부', '형제',
        '명', '부모', '복덕', '주거', '진로', '대인', '대외', '건강', '금전', '자녀', '부부', '형제',
    ];

    public const JAMISEONGGYE = [
        '염정', null, null, '천동', '무곡', '태양', null, '천기', '자미', null, null, null,
        '염정', null, null, '천동', '무곡', '태양', null, '천기', '자미', null, null, null,
        '염정', null, null, '천동', '무곡', '태양', null, '천기', '자미', null, null, null,
    ];

    public const CHEONBUSEONGGYE = [
        null, '천부', '태음', '탐랑', '거문', '천상', '천량', '칠살', null, null, null, '파군',
        null, '천부', '태음', '탐랑', '거문', '천상', '천량', '칠살', null, null, null, '파군',
        null, '천부', '태음', '탐랑', '거문', '천상', '천량', '칠살', null, null, null, '파군',
    ];

    /**
     * 자미두수 명궁.자미
     */
    public function jamidusu(Purchase $purchase): string
    {
        [$myeonggungIndex, $jamiIndex] = $this->default($this->getBirthedAt($purchase));

        return self::JIJI[$myeonggungIndex].self::JIJI[$jamiIndex + 1];
    }

    /**
     * 자미두수 명반
     */
    public function getMyeongban(Purchase $purchase): array
    {
        [$myeonggungIndex, $jamiIndex, $cheonganIndex, $ohaengguk] = $this->default($this->getBirthedAt($purchase));

        $cheonganList = array_slice(self::CHEONGAN, 9 + $cheonganIndex, 12);
        $gungList = array_slice(self::GUNG, (12 - $myeonggungIndex) + 2, 12);
        $jamiList = array_slice(self::JAMISEONGGYE, 12 + (9 - ($jamiIndex % 12)), 12);
        $cheonbuList = array_slice(self::CHEONBUSEONGGYE, $jamiIndex, 12);

        for ($i = 0; $i < 12; $i++) {
            $response['myeongban'][$i] = [
                'cheongan' => $cheonganList[$i],
                'gung' => $gungList[$i],
                'jami' => $jamiList[$i] ?? null,
                'cheonbu' => $cheonbuList[$i] ?? null,
            ];
        }
        $response['position']['myeonggung'] = self::JIJI[$myeonggungIndex];
        $response['position']['jami'] = self::JIJI[$jamiIndex + 1];
        $response['position']['ohaengguk'] = $ohaengguk;

        return $response;
    }

    /**
     * 자미두수 기본값
     */
    public function default(array $birth): array
    {
        $cheonganIndex = (($birth['saju'][0] % 5) * 2 + 2) % 10; // 천간 시작점. 표시용
        $myeonggungIndex = ($birth['date'][1] - $birth['saju'][1] + 1) % 12; // 명궁 위치. 자(0)에서 시작

        $myeonggungCheongan = match ($myeonggungIndex) {
            0 => $cheonganIndex,
            1 => ++$cheonganIndex,
            default => $cheonganIndex + ($myeonggungIndex - 2),
        };
        [$guk, $ohaengguk] = match (($myeonggungCheongan / 2 + $myeonggungIndex / 2 % 3) % 5) {
            0 => [4, '금4국'],
            1 => [2, '수2국'],
            2 => [6, '화6국'],
            3 => [5, '토5국'],
            4 => [3, '목3국'],
        };

        $quotient = ceil($birth['date'][2] / $guk); // 몫수
        $complement = $guk * $quotient - $birth['date'][2]; // 보수
        if ($complement % 2 === 0) {
            $jamiIndex = $quotient + $complement;
        } else {
            $jamiIndex = $quotient - $complement + 12;
        }

        return [$myeonggungIndex, $jamiIndex, $cheonganIndex, $ohaengguk];
    }

    /**
     * 생년월일 출력
     */
    private function getBirthedAt(Purchase $purchase): array
    {
        $birth = (new DateService())->lunar($purchase->birthed_at, $purchase->calendar, 'jamidusu');
        abort_if($birth['saju'][1] === 'error', 400, '잘못된 시간입니다.');

        return $birth;
    }
}
