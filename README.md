# media-backend-public

## Description
언론사 제휴 서비스, 백엔드(라라벨) 공통 코드 분리

- PHP ^8.2
- Laravel 10.x
- MySQL 8.0

## Setting
media-backend-public 폴더 내에 user(혹은 admin) repository 를 받고 심볼릭 링크를 연결한다.  
.env 파일을 추가&설정하고 패키지를 설치한다

```shell
ln -s media-backend-user app
cp .env.example .env
composer install
```

## Execute
PHP 내장 서버를 이용하여 실행하거나 Laravel Sail을 이용하여 실행한다

```shell
php artisan serve

or

./vendor/bin/sail up
```
