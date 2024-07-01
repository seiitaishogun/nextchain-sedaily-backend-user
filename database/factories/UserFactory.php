<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'email' => 'admin@fles.co.kr',
            'password' => Hash::make('password'),
            'name' => '관리자',
            'type' => 'borra',
            'is_admin' => true,
            // 'refresh_token' => Str::random(10),
            // 'remember_token' => Str::random(10),
        ];
    }
}
