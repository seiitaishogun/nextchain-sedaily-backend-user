<?php

namespace Service\Fortune;

use App\Models\Fortune\Manse;
use Carbon\Carbon;

class DateService
{
    /**
     * 생년월일을 음력으로 변환
     */
    public function lunar(string $birthedAt, string $calendar, string $type = null): array
    {
        [$date, $time] = explode(' ', $birthedAt);
        $lunar = match ($calendar) {
            'solar' => $this->manseLunarDate($date),
            'lunar' => $date,
            default => null,
        };
        abort_if(is_null($lunar), 500, __('error.500.server'));

        $saju = [];
        if ($type === 'jamidusu') {
            if (date('Hi', strtotime($time)) >= 2330 && date('Hi', strtotime($time)) <= 2359) {
                $lunar = date('Y-m-d', strtotime($lunar.' +1 day'));
            }
            $saju[] = (explode('-', $lunar)[0] - 4) % 10;
            $saju[] = $this->jiji($time);
        }

        return [
            'date' => explode('-', $lunar),
            'time' => $time,
            'saju' => $saju,
        ];
    }

    /**
     * 만세력 음력
     */
    private function manseLunarDate($date): string
    {
        $manse = Manse::where('solar_date', $date)->first();

        // @todo manses 테이블 수정 후 삭제
        // 을력이 0000이면 0000이 아닌 날자가 나올때까지 뒤로 찾는다.
        if ($manse->lunar_date === '0000-00-00') {
            return Manse::where('solar_date', '<', $date)
                ->orderBy('solar_date', 'desc')
                ->value('lunar_date');
        }

        return Carbon::create($manse->lunar_year, $manse->lunar_month, $manse->lunar_day)->format('Y-m-d');
    }

    /**
     * 생시를 지지로 변환
     */
    private function jiji(string $birthedHour): int
    {
        $birthedHour = date('Hi', strtotime($birthedHour));

        return match (true) {
            $birthedHour >= 000 && $birthedHour <= 130, $birthedHour >= 2330 && $birthedHour <= 2359 => 0,
            $birthedHour >= 130 && $birthedHour <= 330 => 1,
            $birthedHour >= 330 && $birthedHour <= 530 => 2,
            $birthedHour >= 530 && $birthedHour <= 730 => 3,
            $birthedHour >= 730 && $birthedHour <= 930 => 4,
            $birthedHour >= 930 && $birthedHour <= 1130 => 5,
            $birthedHour >= 1130 && $birthedHour <= 1330 => 6,
            $birthedHour >= 1330 && $birthedHour <= 1530 => 7,
            $birthedHour >= 1530 && $birthedHour <= 1730 => 8,
            $birthedHour >= 1730 && $birthedHour <= 1930 => 9,
            $birthedHour >= 1930 && $birthedHour <= 2130 => 10,
            $birthedHour >= 2130 && $birthedHour <= 2330 => 11,
            default => 'error',
        };
    }
}
