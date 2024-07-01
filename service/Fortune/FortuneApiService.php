<?php

namespace Service\Fortune;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class FortuneApiService
{
    /**
     * 헬로우운세 레거시 API 호출
     *
     * @return array|mixed|void
     */
    public function api($userData, string $type = 'saju')
    {
        try {
            // TODO : app env로 변경
            return Http::asForm()->post('http://cp2.hellounse.com/api/production1/'.$type.'/json_result.asp', [
                'userName' => $userData['name'],
                'userSex' => $userData['gender'] === 0 ? 'M' : 'F',
                'userMarry' => $userData['marital'] === 'single' ? 'Single' : 'Married',
                'userBirthY' => Carbon::parse($userData['birthed_at'])->format('Y'),
                'userBirthM' => Carbon::parse($userData['birthed_at'])->format('m'),
                'userBirthD' => Carbon::parse($userData['birthed_at'])->format('d'),
                'userBirthHour' => Carbon::parse($userData['birthed_at'])->format('H'),
                'userBirthMin' => Carbon::parse($userData['birthed_at'])->format('i'),
                'userBirthMType' => $userData['calendar'] === 'solar' ? 1 : 0,
            ])->throw()->json();
        } catch (Exception $e) {
            logger($e);
            abort(500, __('error.500.hellounse'));
        }
    }

    public function post($userData, string $type = 'saju'): int|array
    {
        $data = $this->api($userData, $type);

        if ($type === 'saju') {
            $data = $this->convert($data);
        } elseif ($type === 'daejeongsu') {
            $data = $data['daejeongsu'];
        } else {
            $data = null;
        }

        return $data;
    }

    /**
     * 사주 데이터, 한글로 변환
     */
    protected function convert($data): array
    {
        $data['cheongan']['siju']['eumyang'] = __('fortune.'.$data['cheongan']['siju']['eumyang']);
        $data['cheongan']['ilju']['eumyang'] = __('fortune.'.$data['cheongan']['ilju']['eumyang']);
        $data['cheongan']['wolju']['eumyang'] = __('fortune.'.$data['cheongan']['wolju']['eumyang']);
        $data['cheongan']['nyeonju']['eumyang'] = __('fortune.'.$data['cheongan']['nyeonju']['eumyang']);

        $data['jiji']['siju']['eumyang'] = __('fortune.'.$data['jiji']['siju']['eumyang']);
        $data['jiji']['ilju']['eumyang'] = __('fortune.'.$data['jiji']['ilju']['eumyang']);
        $data['jiji']['wolju']['eumyang'] = __('fortune.'.$data['jiji']['wolju']['eumyang']);
        $data['jiji']['nyeonju']['eumyang'] = __('fortune.'.$data['jiji']['nyeonju']['eumyang']);

        $data['cheongan']['siju']['ohaeng'] = __('fortune.'.$data['cheongan']['siju']['ohaeng']);
        $data['cheongan']['ilju']['ohaeng'] = __('fortune.'.$data['cheongan']['ilju']['ohaeng']);
        $data['cheongan']['wolju']['ohaeng'] = __('fortune.'.$data['cheongan']['wolju']['ohaeng']);
        $data['cheongan']['nyeonju']['ohaeng'] = __('fortune.'.$data['cheongan']['nyeonju']['ohaeng']);

        $data['jiji']['siju']['ohaeng'] = __('fortune.'.$data['jiji']['siju']['ohaeng']);
        $data['jiji']['ilju']['ohaeng'] = __('fortune.'.$data['jiji']['ilju']['ohaeng']);
        $data['jiji']['wolju']['ohaeng'] = __('fortune.'.$data['jiji']['wolju']['ohaeng']);
        $data['jiji']['nyeonju']['ohaeng'] = __('fortune.'.$data['jiji']['nyeonju']['ohaeng']);

        $data['cheongan']['siju']['sibgan'] = __('fortune.'.$data['cheongan']['siju']['sibgan']);
        $data['cheongan']['ilju']['sibgan'] = __('fortune.'.$data['cheongan']['ilju']['sibgan']);
        $data['cheongan']['wolju']['sibgan'] = __('fortune.'.$data['cheongan']['wolju']['sibgan']);
        $data['cheongan']['nyeonju']['sibgan'] = __('fortune.'.$data['cheongan']['nyeonju']['sibgan']);

        $data['jiji']['siju']['sibiji'] = __('fortune.'.$data['jiji']['siju']['sibiji']);
        $data['jiji']['ilju']['sibiji'] = __('fortune.'.$data['jiji']['ilju']['sibiji']);
        $data['jiji']['wolju']['sibiji'] = __('fortune.'.$data['jiji']['wolju']['sibiji']);
        $data['jiji']['nyeonju']['sibiji'] = __('fortune.'.$data['jiji']['nyeonju']['sibiji']);

        $data['gisin']['ohaeng'] = __('fortune.'.$data['gisin']['ohaeng']);

        $data['high_ohaeng'] = __('fortune.'.$data['high_ohaeng']);

        foreach ($data['ganji'] as $key => $ganji) {
            $cheon = mb_substr($ganji, 0, 1);
            $ji = mb_substr($ganji, 1, 2);

            $data['ganji'][$key] = __('fortune.'.$cheon).__('fortune.'.$ji);
        }

        foreach ($data['daeun']['ganji'] as $key => $cheongan) {
            $cheon = mb_substr($cheongan, 0, 1);
            $ji = mb_substr($cheongan, 1, 2);

            $data['daeun']['ganji'][$key] = __('fortune.'.$cheon).__('fortune.'.$ji);
        }

        return $data;
    }

    /**
     * @return array|mixed|void
     */
    public function sibijisinNumber()
    {
        try {
            return Http::asForm()
                ->post('http://cp2.hellounse.com/api/production/sibijisin/json_result.asp')
                ->throw()
                ->json();
        } catch (Exception $e) {
            logger($e);
            abort(500, __('error.500.hellounse'));
        }
    }
}
