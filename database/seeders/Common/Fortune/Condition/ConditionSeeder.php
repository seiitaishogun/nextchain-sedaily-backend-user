<?php

namespace Database\Seeders\Common\Fortune\Condition;

use App\Models\Fortune\Condition;
use App\Models\Fortune\ConditionValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ConditionSeeder extends Seeder
{
    public function run(): void
    {
        // TODO: conditionValue 개선
        $sajuValue = [
            'eumyang' => ['음', '양'],
            'ohaeng' => ['목', '화', '토', '금', '수'],
            'sibsin' => ['비견', '겁재', '식신', '상관', '정재', '편재', '정관', '편관', '정인', '편인'],
            'yugchin' => ['비겁', '식상', '재성', '관성', '인성'],
            'sibgan' => ['갑', '을', '병', '정', '무', '기', '경', '신', '임', '계'],
            'sibiji' => ['자', '축', '인', '묘', '진', '사', '오', '미', '신', '유', '술', '해'],
        ];

        $conditions = [
            // 사주-천간
            [
                'type_id' => 1,
                'name' => '천간-시주-음양',
                'path' => 'cheongan,siju,eumyang',
                'value' => ['음', '양'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-시주-간지',
                'path' => 'cheongan,siju,sibgan',
                'value' => ['갑', '을', '병', '정', '무', '기', '경', '신', '임', '계'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-시주-오행',
                'path' => 'cheongan,siju,ohaeng',
                'value' => ['목', '화', '토', '금', '수'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-시주-십신',
                'path' => 'cheongan,siju,sibsin',
                'value' => ['비견', '겁재', '식신', '상관', '정재', '편재', '정관', '편관', '정인', '편인'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-시주-시간육친',
                'path' => 'cheongan,siju,yugchin',
                'value' => ['비겁', '식상', '재성', '관성', '인성'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-일주-음양',
                'path' => 'cheongan,ilju,eumyang',
                'value' => ['음', '양'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-일주-간지',
                'path' => 'cheongan,ilju,sibgan',
                'value' => ['갑', '을', '병', '정', '무', '기', '경', '신', '임', '계'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-일주-오행',
                'path' => 'cheongan,ilju,ohaeng',
                'value' => ['목', '화', '토', '금', '수'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-일주-십신',
                'path' => 'cheongan,ilju,sibsin',
                'value' => ['비견', '겁재', '식신', '상관', '정재', '편재', '정관', '편관', '정인', '편인'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-일주-일간육친',
                'path' => 'cheongan,ilju,yugchin',
                'value' => ['비겁', '식상', '재성', '관성', '인성'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-월주-음양',
                'path' => 'cheongan,wolju,eumyang',
                'value' => ['음', '양'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-월주-간지',
                'path' => 'cheongan,wolju,sibgan',
                'value' => ['갑', '을', '병', '정', '무', '기', '경', '신', '임', '계'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-월주-오행',
                'path' => 'cheongan,wolju,ohaeng',
                'value' => ['목', '화', '토', '금', '수'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-월주-십신',
                'path' => 'cheongan,wolju,sibsin',
                'value' => ['비견', '겁재', '식신', '상관', '정재', '편재', '정관', '편관', '정인', '편인'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-월주-월간육친',
                'path' => 'cheongan,wolju,yugchin',
                'value' => ['비겁', '식상', '재성', '관성', '인성'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-년주-음양',
                'path' => 'cheongan,nyeonju,eumyang',
                'value' => ['음', '양'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-년주-간지',
                'path' => 'cheongan,nyeonju,sibgan',
                'value' => ['갑', '을', '병', '정', '무', '기', '경', '신', '임', '계'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-년주-오행',
                'path' => 'cheongan,nyeonju,ohaeng',
                'value' => ['목', '화', '토', '금', '수'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-년주-십신',
                'path' => 'cheongan,nyeonju,sibsin',
                'value' => ['비견', '겁재', '식신', '상관', '정재', '편재', '정관', '편관', '정인', '편인'],
            ],
            [
                'type_id' => 1,
                'name' => '천간-년주-연간육친',
                'path' => 'cheongan,nyeonju,yugchin',
                'value' => ['비겁', '식상', '재성', '관성', '인성'],
            ],
            // 사주-지지
            [
                'type_id' => 1,
                'name' => '지지-시주-음양',
                'path' => 'jiji,siju,eumyang',
                'value' => ['음', '양'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-시주-간지',
                'path' => 'jiji,siju,sibiji',
                'value' => ['자', '축', '인', '묘', '진', '사', '오', '미', '신', '유', '술', '해'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-시주-오행',
                'path' => 'jiji,siju,ohaeng',
                'value' => ['목', '화', '토', '금', '수'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-시주-십신',
                'path' => 'jiji,siju,sibsin',
                'value' => ['비견', '겁재', '식신', '상관', '정재', '편재', '정관', '편관', '정인', '편인'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-시주-시지육친',
                'path' => 'jiji,siju,yugchin',
                'value' => ['비겁', '식상', '재성', '관성', '인성'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-일주-음양',
                'path' => 'jiji,ilju,eumyang',
                'value' => ['음', '양'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-일주-간지',
                'path' => 'jiji,ilju,sibiji',
                'value' => ['자', '축', '인', '묘', '진', '사', '오', '미', '신', '유', '술', '해'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-일주-오행',
                'path' => 'jiji,ilju,ohaeng',
                'value' => ['목', '화', '토', '금', '수'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-일주-십신',
                'path' => 'jiji,ilju,sibsin',
                'value' => ['비견', '겁재', '식신', '상관', '정재', '편재', '정관', '편관', '정인', '편인'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-일주-일지육친',
                'path' => 'jiji,ilju,yugchin',
                'value' => ['비겁', '식상', '재성', '관성', '인성'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-월주-음양',
                'path' => 'jiji,wolju,eumyang',
                'value' => ['음', '양'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-월주-간지',
                'path' => 'jiji,wolju,sibiji',
                'value' => ['자', '축', '인', '묘', '진', '사', '오', '미', '신', '유', '술', '해'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-월주-오행',
                'path' => 'jiji,wolju,ohaeng',
                'value' => ['목', '화', '토', '금', '수'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-월주-십신',
                'path' => 'jiji,wolju,sibsin',
                'value' => ['비견', '겁재', '식신', '상관', '정재', '편재', '정관', '편관', '정인', '편인'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-월주-월지육친',
                'path' => 'jiji,wolju,yugchin',
                'value' => ['비겁', '식상', '재성', '관성', '인성'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-년주-음양',
                'path' => 'jiji,nyeonju,eumyang',
                'value' => ['음', '양'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-년주-간지',
                'path' => 'jiji,nyeonju,sibiji',
                'value' => ['자', '축', '인', '묘', '진', '사', '오', '미', '신', '유', '술', '해'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-년주-오행',
                'path' => 'jiji,nyeonju,ohaeng',
                'value' => ['목', '화', '토', '금', '수'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-년주-십신',
                'path' => 'jiji,nyeonju,sibsin',
                'value' => ['비견', '겁재', '식신', '상관', '정재', '편재', '정관', '편관', '정인', '편인'],
            ],
            [
                'type_id' => 1,
                'name' => '지지-년주-연지육친',
                'path' => 'jiji,nyeonju,yugchin',
                'value' => ['비겁', '식상', '재성', '관성', '인성'],
            ],
            // 대운
            [
                'type_id' => 1,
                'name' => '대운-순서',
                'path' => 'daeun,order',
            ],
            [
                'type_id' => 1,
                'name' => '대운-나이',
                'path' => 'daeun,age',
            ],
            [
                'type_id' => 1,
                'name' => '대운-천간-n세',
                'path' => 'daeun,cheongan,0',
            ],
            [
                'type_id' => 1,
                'name' => '대운-천간-10+n세',
                'path' => 'daeun,cheongan,1',
            ],
            [
                'type_id' => 1,
                'name' => '대운-천간-20+n세',
                'path' => 'daeun,cheongan,2',
            ],
            [
                'type_id' => 1,
                'name' => '대운-천간-30+n세',
                'path' => 'daeun,cheongan,3',
            ],
            [
                'type_id' => 1,
                'name' => '대운-천간-40+n세',
                'path' => 'daeun,cheongan,4',
            ],
            [
                'type_id' => 1,
                'name' => '대운-천간-50+n세',
                'path' => 'daeun,cheongan,5',
            ],
            [
                'type_id' => 1,
                'name' => '대운-천간-60+n세',
                'path' => 'daeun,cheongan,6',
            ],
            [
                'type_id' => 1,
                'name' => '대운-천간-70+n세',
                'path' => 'daeun,cheongan,7',
            ],
            [
                'type_id' => 1,
                'name' => '대운-지지-n세',
                'path' => 'daeun,jiji,0',
            ],
            [
                'type_id' => 1,
                'name' => '대운-지지-10+n세',
                'path' => 'daeun,jiji,1',
            ],
            [
                'type_id' => 1,
                'name' => '대운-지지-20+n세',
                'path' => 'daeun,jiji,2',
            ],
            [
                'type_id' => 1,
                'name' => '대운-지지-30+n세',
                'path' => 'daeun,jiji,3',
            ],
            [
                'type_id' => 1,
                'name' => '대운-지지-40+n세',
                'path' => 'daeun,jiji,4',
            ],
            [
                'type_id' => 1,
                'name' => '대운-지지-50+n세',
                'path' => 'daeun,jiji,5',
            ],
            [
                'type_id' => 1,
                'name' => '대운-지지-60+n세',
                'path' => 'daeun,jiji,6',
            ],
            [
                'type_id' => 1,
                'name' => '대운-지지-70+n세',
                'path' => 'daeun,jiji,7',
            ],
            // 토정
            [
                'type_id' => 1,
                'name' => '토정-년',
                'path' => 'tojeong,year',
                'value' => [
                    '111', '112', '113', '121', '122', '123', '131', '132', '133', '141', '142', '143', '151', '152',
                    '153', '161', '162', '163', '211', '212', '213', '221', '222', '223', '231', '232', '233', '241',
                    '242', '243', '251', '252', '253', '261', '262', '263', '311', '312', '313', '321', '322', '323',
                    '331', '332', '333', '341', '342', '343', '351', '352', '353', '361', '362', '363', '411', '412',
                    '413', '421', '422', '423', '431', '432', '433', '441', '442', '443', '451', '452', '453', '461',
                    '462', '463', '511', '512', '513', '521', '522', '523', '531', '532', '533', '541', '542', '543',
                    '551', '552', '553', '561', '562', '563', '611', '612', '613', '621', '622', '623', '631', '632',
                    '633', '641', '642', '643', '651', '652', '653', '661', '662', '663', '711', '712', '713', '721',
                    '722', '723', '731', '732', '733', '741', '742', '743', '751', '752', '753', '761', '762', '763',
                    '811', '812', '813', '821', '822', '823', '831', '832', '833', '841', '842', '843', '851', '852',
                    '853', '861', '862', '863',
                ],
            ],
            [
                'type_id' => 1,
                'name' => '토정-월',
                'path' => 'tojeong,month',
                'value' => [
                    '11', '12', '13', '14', '15', '16', '17', '18', '21', '22', '23', '24', '25', '26', '27', '28',
                    '31', '32', '33', '34', '35', '36', '37', '38', '41', '42', '43', '44', '45', '46', '47', '48',
                    '51', '52', '53', '54', '55', '56', '57', '58', '61', '62', '63', '64', '65', '66', '67', '68',
                    '71', '72', '73', '74', '75', '76', '77', '78', '81', '82', '83', '84', '85', '86', '87', '88',
                ],
            ],
            // 신강약
            [
                'type_id' => 1,
                'name' => '신강약-1',
                'path' => 'singangyag,1',
                'value' => ['강', '중', '약'],
            ],
            [
                'type_id' => 1,
                'name' => '신강약-2',
                'path' => 'singangyag,2',
                'value' => ['강강', '강중', '강약', '중강', '중중', '중약', '약강', '약중', '약약'],

            ],
            [
                'type_id' => 1,
                'name' => '신강약-3',
                'path' => 'singangyag,3',
                'value' => [
                    '강강강', '강강중', '강강약', '강중강', '강중중', '강중약', '강약강', '강약중', '강약약', '중강강', '중강중', '중강약', '중중강', '중중중',
                    '중중약', '중약강', '중약중', '중약약', '약강강', '약강중', '약강약', '약중강', '약중중', '약중약', '약약강', '약약중', '약약약',
                ],
            ],
            // 오행
            [
                'type_id' => 1,
                'name' => '오행-목',
                'path' => 'ohaeng,tree',
                'value' => ['목'],
            ],
            [
                'type_id' => 1,
                'name' => '오행-화',
                'path' => 'ohaeng,fire',
                'value' => ['화'],
            ],
            [
                'type_id' => 1,
                'name' => '오행-토',
                'path' => 'ohaeng,soil',
                'value' => ['토'],

            ],
            [
                'type_id' => 1,
                'name' => '오행-금',
                'path' => 'ohaeng,iron',
                'value' => ['금'],
            ],
            [
                'type_id' => 1,
                'name' => '오행-수',
                'path' => 'ohaeng,water',
                'value' => ['수'],
            ],
            // 높은_오행
            [
                'type_id' => 1,
                'name' => '높은 오행-0',
                'path' => 'high_ohaeng,high_ohaeng',
                'value' => ['목', '화', '토', '금', '수'],
            ],
            [
                'type_id' => 1,
                'name' => '양인-0',
                'path' => 'yangin,yangin',
                'value' => ['Yang', 'Yin'],
            ],
            [
                'type_id' => 1,
                'name' => '대정수',
                'path' => 'daejeongsu',
                'value' => [
                    '11', '12', '13', '14', '15', '16', '17', '18', '21', '22', '23', '24', '25', '26', '27', '28',
                    '31', '32', '33', '34', '35', '36', '37', '38', '41', '42', '43', '44', '45', '46', '47', '48',
                    '51', '52', '53', '54', '55', '56', '57', '58', '61', '62', '63', '64', '65', '66', '67', '68',
                    '71', '72', '73', '74', '75', '76', '77', '78', '81', '82', '83', '84', '85', '86', '87', '88',
                ],
            ],
            [
                'type_id' => 1,
                'name' => '신살',
                'path' => 'shinsal',
                'value' => ['원진', '충', '오행', '합', '상생'],
            ],
            // 용신
            [
                'type_id' => 1,
                'name' => '용신-십신',
                'path' => 'yongsin,sibsin',
                'value' => ['비견', '겁재', '식신', '상관', '정재', '편재', '정관', '편관', '정인', '편인'],
            ],
            [
                'type_id' => 1,
                'name' => '용신-육친',
                'path' => 'yongsin,yugchin',
                'value' => ['비겁', '식상', '재성', '관성', '인성'],
            ],
            // 주역
            [
                'type_id' => 2, 'name' => '괘',
                'path' => 'gwae',
            ],
            // 타로
            [
                'type_id' => 3, 'name' => '타로',
                'path' => 'tarot',
            ],
            // 띠별
            [
                'type_id' => 5,
                'name' => '십이지신',
                'path' => 'sibijisin',
                'value' => ['자', '축', '인', '묘', '진', '사', '오', '미', '신', '유', '술', '해'],
            ],
            [
                'type_id' => 5,
                'name' => '십이지신 번호',
                'path' => 'sibijisin_number',
                'value' => [
                    '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18',
                    '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34',
                    '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48',
                ],
            ],
            // 별자리
            [
                'type_id' => 6,
                'name' => '별자리',
                'path' => 'byeoljali',
            ],
            // 공통
            [
                'name' => '성별',
                'path' => 'gender',
                'value' => ['0', '1'],
            ],
            [
                'name' => '결혼',
                'path' => 'marital',
                'value' => ['single', 'couple', 'married'],
            ],
            [
                'name' => '월',
                'path' => 'month',
                'value' => ['even', 'odd'],
            ],
            [
                'name' => '음력',
                'path' => 'lunar',
                'value' => [
                    '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18',
                    '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31',
                ],
            ],
            [
                'name' => '기타',
                'path' => 'etc',
            ],
        ];

        foreach ($conditions as $condition) {
            $id = Condition::firstOrCreate([
                'type_id' => $condition['type_id'] ?? null,
                'name' => $condition['name'],
                'path' => $condition['path'],
            ]);

            if (Arr::exists($condition, 'value')) {
                foreach ($condition['value'] as $value) {
                    ConditionValue::firstOrCreate([
                        'condition_id' => $id->id,
                        'name' => $value,
                    ]);
                }
            }
        }
    }
}
