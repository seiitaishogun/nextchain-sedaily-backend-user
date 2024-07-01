<?php

namespace Database\Seeders\Common\Fortune\Condition;

use App\Models\Fortune\Condition;
use Illuminate\Database\Seeder;

class SajuSeeder extends Seeder
{
    public function run(): void
    {
        $saju = [
            // 사주-천간
            [
                'type_id' => 2,
                'name' => '시간-음양',
                'path' => 'cheongan,siju,eumyang',
            ], [
                'type_id' => 2,
                'name' => '시간-십간',
                'path' => 'cheongan,siju,sibgan',
            ], [
                'type_id' => 2,
                'name' => '시간-오행',
                'path' => 'cheongan,siju,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '시간-십신',
                'path' => 'cheongan,siju,sibsin',
            ], [
                'type_id' => 2,
                'name' => '시간-육친',
                'path' => 'cheongan,siju,yugchin',
            ], [
                'type_id' => 2,
                'name' => '일간-음양',
                'path' => 'cheongan,ilju,eumyang',
            ], [
                'type_id' => 2,
                'name' => '일간-십간',
                'path' => 'cheongan,ilju,sibgan',
            ], [
                'type_id' => 2,
                'name' => '일간-오행',
                'path' => 'cheongan,ilju,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '일간-십신',
                'path' => 'cheongan,ilju,sibsin',
            ], [
                'type_id' => 2,
                'name' => '일간-육친',
                'path' => 'cheongan,ilju,yugchin',
            ], [
                'type_id' => 2,
                'name' => '월간-음양',
                'path' => 'cheongan,wolju,eumyang',
            ], [
                'type_id' => 2,
                'name' => '월간-십간',
                'path' => 'cheongan,wolju,sibgan',
            ], [
                'type_id' => 2,
                'name' => '월간-오행',
                'path' => 'cheongan,wolju,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '월간-십신',
                'path' => 'cheongan,wolju,sibsin',
            ], [
                'type_id' => 2,
                'name' => '월간-육친',
                'path' => 'cheongan,wolju,yugchin',
            ], [
                'type_id' => 2,
                'name' => '연간-음양',
                'path' => 'cheongan,nyeonju,eumyang',
            ], [
                'type_id' => 2,
                'name' => '연간-십간',
                'path' => 'cheongan,nyeonju,sibgan',
            ], [
                'type_id' => 2,
                'name' => '연간-오행',
                'path' => 'cheongan,nyeonju,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '연간-십신',
                'path' => 'cheongan,nyeonju,sibsin',
            ], [
                'type_id' => 2,
                'name' => '연간-육친',
                'path' => 'cheongan,nyeonju,yugchin',
            ],
            // 사주-지지
            [
                'type_id' => 2,
                'name' => '시지-음양',
                'path' => 'jiji,siju,eumyang',
            ], [
                'type_id' => 2,
                'name' => '시지-십이지',
                'path' => 'jiji,siju,sibiji',
            ], [
                'type_id' => 2,
                'name' => '시지-오행',
                'path' => 'jiji,siju,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '시지-십신',
                'path' => 'jiji,siju,sibsin',
            ], [
                'type_id' => 2,
                'name' => '시지-육친',
                'path' => 'jiji,siju,yugchin',
            ], [
                'type_id' => 2,
                'name' => '일지-음양',
                'path' => 'jiji,ilju,eumyang',
            ], [
                'type_id' => 2,
                'name' => '일지-십이지',
                'path' => 'jiji,ilju,sibiji',
            ], [
                'type_id' => 2,
                'name' => '일지-오행',
                'path' => 'jiji,ilju,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '일지-십신',
                'path' => 'jiji,ilju,sibsin',
            ], [
                'type_id' => 2,
                'name' => '일지-육친',
                'path' => 'jiji,ilju,yugchin',
            ], [
                'type_id' => 2,
                'name' => '월지-음양',
                'path' => 'jiji,wolju,eumyang',
            ], [
                'type_id' => 2,
                'name' => '월지-십이지',
                'path' => 'jiji,wolju,sibiji',
            ], [
                'type_id' => 2,
                'name' => '월지-오행',
                'path' => 'jiji,wolju,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '월지-십신',
                'path' => 'jiji,wolju,sibsin',
            ], [
                'type_id' => 2,
                'name' => '월지-육친',
                'path' => 'jiji,wolju,yugchin',
            ], [
                'type_id' => 2,
                'name' => '연지-음양',
                'path' => 'jiji,nyeonju,eumyang',
            ], [
                'type_id' => 2,
                'name' => '연지-십이지',
                'path' => 'jiji,nyeonju,sibiji',
            ], [
                'type_id' => 2,
                'name' => '연지-오행',
                'path' => 'jiji,nyeonju,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '연지-십신',
                'path' => 'jiji,nyeonju,sibsin',
            ], [
                'type_id' => 2,
                'name' => '연지-육친',
                'path' => 'jiji,nyeonju,yugchin',
            ], [
                'type_id' => 2,
                'name' => '대운-순서',
                'path' => 'daeun,order',
            ], [
                'type_id' => 2,
                'name' => '대운-대운수',
                'path' => 'daeun,daeunsu',
            ], [
                'type_id' => 2,
                'name' => '대운-천간-n세',
                'path' => 'daeun,cheongan,0',
            ], [
                'type_id' => 2,
                'name' => '대운-천간-10+n세',
                'path' => 'daeun,cheongan,1',
            ], [
                'type_id' => 2,
                'name' => '대운-천간-20+n세',
                'path' => 'daeun,cheongan,2',
            ], [
                'type_id' => 2,
                'name' => '대운-천간-30+n세',
                'path' => 'daeun,cheongan,3',
            ], [
                'type_id' => 2,
                'name' => '대운-천간-40+n세',
                'path' => 'daeun,cheongan,4',
            ], [
                'type_id' => 2,
                'name' => '대운-천간-50+n세',
                'path' => 'daeun,cheongan,5',
            ], [
                'type_id' => 2,
                'name' => '대운-천간-60+n세',
                'path' => 'daeun,cheongan,6',
            ], [
                'type_id' => 2,
                'name' => '대운-천간-70+n세',
                'path' => 'daeun,cheongan,7',
            ], [
                'type_id' => 2,
                'name' => '대운-지지-n세',
                'path' => 'daeun,jiji,0',
            ], [
                'type_id' => 2,
                'name' => '대운-지지-10+n세',
                'path' => 'daeun,jiji,1',
            ], [
                'type_id' => 2,
                'name' => '대운-지지-20+n세',
                'path' => 'daeun,jiji,2',
            ], [
                'type_id' => 2,
                'name' => '대운-지지-30+n세',
                'path' => 'daeun,jiji,3',
            ], [
                'type_id' => 2,
                'name' => '대운-지지-40+n세',
                'path' => 'daeun,jiji,4',
            ], [
                'type_id' => 2,
                'name' => '대운-지지-50+n세',
                'path' => 'daeun,jiji,5',
            ], [
                'type_id' => 2,
                'name' => '대운-지지-60+n세',
                'path' => 'daeun,jiji,6',
            ], [
                'type_id' => 2,
                'name' => '대운-지지-70+n세',
                'path' => 'daeun,jiji,7',
            ],
            // 토정
            [
                'type_id' => 2,
                'name' => '토정-년',
                'path' => 'tojeong,year',
            ], [
                'type_id' => 2,
                'name' => '토정-월',
                'path' => 'tojeong,month',
            ],
            // 신강약
            [
                'type_id' => 2,
                'name' => '신강약-1',
                'path' => 'singangyag,1',
            ], [
                'type_id' => 2,
                'name' => '신강약-2',
                'path' => 'singangyag,2',
            ], [
                'type_id' => 2,
                'name' => '신강약-3',
                'path' => 'singangyag,3',
            ],

            // 높은_오행
            [
                'type_id' => 2,
                'name' => '높은 오행',
                'path' => 'high_ohaeng',
            ], [
                'type_id' => 2,
                'name' => '양인',
                'path' => 'yangin',
            ], [
                'type_id' => 2,
                'name' => '신살',
                'path' => 'shinsal',
            ],
            // 용신
            [
                'type_id' => 2,
                'name' => '기신-오행',
                'path' => 'gisin,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '기신-십신',
                'path' => 'gisin,sibsin',
            ], [
                'type_id' => 2,
                'name' => '기신-육친',
                'path' => 'gisin,yugchin',
            ], [
                'type_id' => 2,
                'name' => '용신-오행',
                'path' => 'yongsin,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '용신-십신',
                'path' => 'yongsin,sibsin',
            ], [
                'type_id' => 2,
                'name' => '용신-육친',
                'path' => 'yongsin,yugchin',
            ], /* [
                'type_id' => 2,
                'name' => '희신-오행',
                'path' => 'huisin,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '희신-십신',
                'path' => 'huisin,sibsin',
            ], [
                'type_id' => 2,
                'name' => '희신-육친',
                'path' => 'huisin,yugchin',
            ], [
                'type_id' => 2,
                'name' => '구신-오행',
                'path' => 'gusin,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '구신-십신',
                'path' => 'gusin,sibsin',
            ], [
                'type_id' => 2,
                'name' => '구신-육친',
                'path' => 'gusin,yugchin',
            ], [
                'type_id' => 2,
                'name' => '한신-오행',
                'path' => 'hansin,ohaeng',
            ], [
                'type_id' => 2,
                'name' => '한신-십신',
                'path' => 'hansin,sibsin',
            ], [
                'type_id' => 2,
                'name' => '한신-육친',
                'path' => 'hansin,yugchin',
            ], */
            // 대정수
            [
                'type_id' => 2,
                'name' => '대정수-평생',
                'path' => 'daejeongsu,forever',
            ],  [
                'type_id' => 2,
                'name' => '대정수-후천',
                'path' => 'daejeongsu,after',
            ], [
                'type_id' => 2,
                'name' => '대정수-동효',
                'path' => 'daejeongsu,donghyo',
            ], [
                'type_id' => 2,
                'name' => '대정수-키-일',
                'path' => 'daejeongsu,key,day',
            ], [
                'type_id' => 2,
                'name' => '대정수-키-월',
                'path' => 'daejeongsu,key,month',
            ],
            // 간지
            [
                'type_id' => 2,
                'name' => '간지-시주',
                'path' => 'ganji,siju',
            ], [
                'type_id' => 2,
                'name' => '간지-일주',
                'path' => 'ganji,ilju',
            ], [
                'type_id' => 2,
                'name' => '간지-월주',
                'path' => 'ganji,wolju',
            ], [
                'type_id' => 2,
                'name' => '간지-년주',
                'path' => 'ganji,nyeonju',
            ],
            // 대운
            [
                'type_id' => 2,
                'name' => '대운-간지-n세',
                'path' => 'daeun,ganji,0',
            ], [
                'type_id' => 2,
                'name' => '대운-간지-1n세',
                'path' => 'daeun,ganji,1',
            ], [
                'type_id' => 2,
                'name' => '대운-간지-2n세',
                'path' => 'daeun,ganji,2',
            ], [
                'type_id' => 2,
                'name' => '대운-간지-3n세',
                'path' => 'daeun,ganji,3',
            ], [
                'type_id' => 2,
                'name' => '대운-간지-4n세',
                'path' => 'daeun,ganji,4',
            ], [
                'type_id' => 2,
                'name' => '대운-간지-5n세',
                'path' => 'daeun,ganji,5',
            ], [
                'type_id' => 2,
                'name' => '대운-간지-6n세',
                'path' => 'daeun,ganji,6',
            ], [
                'type_id' => 2,
                'name' => '대운-간지-7n세',
                'path' => 'daeun,ganji,7',
            ],
            // 세운
            [
                'type_id' => 2,
                'name' => '세운-일간',
                'path' => 'seun,ilju,cheongan',
            ],
            [
                'type_id' => 2,
                'name' => '세운-일지',
                'path' => 'seun,ilju,jiji',
            ],
            [
                'type_id' => 2,
                'name' => '세운-월간',
                'path' => 'seun,wolju,cheongan',
            ],
            [
                'type_id' => 2,
                'name' => '세운-월지',
                'path' => 'seun,wolju,jiji',
            ],
            [
                'type_id' => 2,
                'name' => '세운-연간',
                'path' => 'seun,nyeonju,cheongan',
            ],
            [
                'type_id' => 2,
                'name' => '세운-연지',
                'path' => 'seun,nyeonju,jiji',
            ],
        ];

        foreach ($saju as $condition) {
            Condition::firstOrCreate([
                'type_id' => $condition['type_id'],
                'name' => $condition['name'],
                'path' => $condition['path'],
            ]);
        }

        unset($saju);
    }
}
