<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute 는 승인되어야 합니다.',
    'accepted_if' => ':attribute 는 :other 가 :value 일 때 승인되어야 합니다.',
    'active_url' => '유효한 URL이 아닙니다.',
    'after' => ':date 이후의 날짜를 선택해주세요.',
    'after_or_equal' => ':date 이후의 날짜는 선택할 수 없습니다.',
    'alpha' => '영어로 된 문자만 입력해주세요.',
    'alpha_dash' => '문자, 숫자, 대시(-) 및 언더 바(_)만 사용할 수 있습니다.',
    'alpha_num' => '문자와 숫자만 사용할 수 있습니다.',
    'array' => '배열이어야 합니다.',
    'before' => '오늘보다 이전의 날짜를 선택해주세요.',
    'before_or_equal' => '오늘 이후의 날짜를 선택할 수 없습니다.',
    'between' => [
        'array' => ':min자 이상, :max자 이하로 입력해주세요.',
        'file' => ':min kb 이상, :max kb 이하의 파일을 첨부해주세요.',
        'numeric' => ':min ~ :max 사이의 수를 입력해주세요.',
        'string' => ':min자 이상, :max 자 이하로 입력해주세요.',
    ],
    'boolean' => ':attribute 필드는 true 또는 false여야 합니다.',
    'confirmed' => '입력된 값이 일치하지 않습니다.',
    'current_password' => '비밀번호가 올바르지 않습니다.',
    'date' => '유효한 날짜가 아닙니다.',
    'date_equals' => ':date 와 같은 날짜여야 합니다.',
    'date_format' => '입력한 :date와 일치하지 않습니다.',
    'declined' => ':attribute 은(는) 거부되어야 합니다.',
    'declined_if' => ':other 가 :value 인 경우 :attribute 를 거부해야 합니다.',
    'different' => ':attribute 와 :other 는 달라야 합니다.',
    'digits' => '아라비아 숫자(0~9)로만 입력해주세요.',
    'digits_between' => ':min ~ :max 사이의 수를 입력해주세요.',
    'dimensions' => '잘못된 크기의 이미지 파일입니다.',
    'distinct' => '중복된 값이 입력되었습니다.',
    'doesnt_start_with' => '다음 중 하나로 시작해야 합니다: :values.',
    'email' => '유효한 이메일 주소를 입력해주세요.',
    'ends_with' => '다음 중 하나의 도메인을 선택해주세요',
    'enum' => '선택한 :attribute 가 유효하지 않습니다.',
    'exists' => '선택한 :attribute 가 유효하지 않습니다.',
    'file' => '올바른 형식의 파일을 올려주세요.',
    'filled' => '이 항목은 빈칸으로 둘 수 없습니다.',
    'gt' => [
        'array' => ':value자 이상 입력해주세요.',
        'file' => 'value kb 이상의 파일을 올려주세요.',
        'numeric' => ':value 이상의 숫자를 입력해주세요.',
        'string' => ':value자 이상 입력해주세요.',
    ],
    'gte' => [
        'array' => ':value자 이상 입력해주세요.',
        'file' => ':value kb 이상의 파일을 올려주세요.',
        'numeric' => ':value 이상의 숫자를 입력해주세요.',
        'string' => ':value자 이상 입력해주세요.',
    ],
    'image' => '이미지 파일을 올려주세요.',
    'in' => '선택한 :attribute 가 유효하지 않습니다.',
    'in_array' => ':attribute 필드가 :other에 없습니다.',
    'integer' => '정수만 입력할 수 있습니다.',
    'ip' => '유효한 IP 주소가 아닙니다.',
    'ipv4' => '유효한 IPv4 주소가 아닙니다.',
    'ipv6' => '유효한 IPv6 주소가 아닙니다.',
    'json' => ':attribute 는 유효한 JSON 문자열이어야 합니다.',
    'lt' => [
        'array' => ':value자 미만으로 입력해주세요.',
        'file' => ':value kb 미만의 파일을 올려주세요.',
        'numeric' => ':value 미만의 숫자를 입력해주세요.',
        'string' => ':value 자 미만으로 입력해주세요.',
    ],
    'lte' => [
        'array' => ':value자 미만으로 입력해주세요.',
        'file' => ':value kb 이하의 파일을 올려주세요.',
        'numeric' => ':value 이하의 숫자를 입력해주세요.',
        'string' => ':value자 이하로 입력해주세요.',
    ],
    'mac_address' => '유효한 MAC 주소가 아닙니다.',
    'max' => [
        'array' => ':max자 미만으로 입력해주세요.',
        'file' => ':max kb 미만의 파일을 올려주세요.',
        'numeric' => ':max 이하의 숫자를 입력해주세요.',
        'string' => ':max 자 미만으로 입력해주세요.',
    ],
    'mimes' => '다음 유형의 파일이어야 합니다: :values.',
    'mimetypes' => '다음 유형의 파일이어야 합니다: :values.',
    'min' => [
        'array' => ':min자 이상으로 입력해주세요.',
        'file' => ':min kb 이상의 파일을 올려주세요.',
        'numeric' => ':min 이상의 숫자를 입력해주세요.',
        'string' => ':min 자 이상으로 입력해주세요.',
    ],
    'multiple_of' => ':attribute 는 :value 의 배수여야 합니다.',
    'not_in' => '유효하지 않은 값입니다.',
    'not_regex' => '잘못된 형식의 입력값입니다.',
    'numeric' => '숫자만 입력할 수 있습니다.',
    'password' => [
        'letters' => '비밀번호는 최소 하나의 문자를 포함해야 합니다.',
        'mixed' => '비밀번호는 최소 하나의 대문자와 하나의 소문자를 포함해야 합니다.',
        'numbers' => ':비밀번호는 최소 하나의 숫자를 포함해야 합니다.',
        'symbols' => '비밀번호는 최소 하나의 기호를 포함해야 합니다.',
        'uncompromised' => '제공된 :attribute 가 데이터 유출에 나타났습니다. 다른 :attribute 을 선택하세요.',
    ],
    'present' => ':attribute 필드가 있어야 합니다.',
    'prohibited' => ':attribute 필드는 금지되어 있습니다.',
    'prohibited_if' => ':other 가 :value 인 경우, :attribute 필드는 입력할 수 없습니다.',
    'prohibited_unless' => ':other 가 :values 에 없으면 :attribute 필드는 금지됩니다.',
    'prohibits' => ':attribute 필드는 :other 가 존재하는 것을 금지합니다.',
    'regex' => '잘못된 형식입니다.',
    'required' => '필수로 입력해야 합니다.',
    'required_array_keys' => '다음 항목을 포함해야 합니다: :values.',
    'required_if' => ':other 가 :value 인 경우 :attribute 필드가 필요합니다.',
    'required_unless' => ':other 가 :values 에 없으면 :attribute 필드가 필요합니다.',
    'required_with' => ':values 가 있는 경우 :attribute 필드가 필요합니다.',
    'required_with_all' => ':values 가 있는 경우 :attribute 필드가 필요합니다.',
    'required_without' => ':values 가 없으면 :attribute 필드가 필요합니다.',
    'required_without_all' => ':values 가 하나도 없으면 :attribute 필드가 필요합니다.',
    'same' => ':attribute 와 :other 는 일치해야 합니다.',
    'size' => [
        'array' => ':size 항목을 포함해야 합니다.',
        'file' => ':size kb의 파일을 올려주세요.',
        'numeric' => ':size 의 파일을 올려주세요.',
        'string' => ':size자 이하로 입력해주세요.',
    ],
    'starts_with' => '다음 중 하나로 시작해야 합니다: :values.',
    'string' => '문자만 입력해주세요.',
    'timezone' => '유효한 시간대를 입력해주세요.',
    'unique' => '이미 사용 중인 아이디입니다.',
    'uploaded' => '업로드에 실패했습니다.',
    'url' => '유효한 URL을 입력해주세요.',
    'uuid' => '유효한 UUID를 입력해주세요.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
