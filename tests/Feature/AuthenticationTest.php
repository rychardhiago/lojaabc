<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    public function testLogin()
    {
        $userData = [
            "email" => "lojaabc@gmail.com",
            "password" => "lojaabc@2024"
        ];

        $this->json('POST', 'api/login', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure(
                [
                    'user' => [
                        'id',
                        'name',
                        'email',
                        'email_verified_at',
                        'created_at',
                        'updated_at'
                    ],
                    'token'
                ]
            );
    }


    public function testLoginError()
    {

        $userData = [
            "email" => "lojaabc@gmail.com",
            "password" => "123"
        ];

        $this->json('POST', 'api/login', $userData)
            ->assertStatus(404)
            ->assertJson([
                'message' => ['These credentials do not match our records.'],
            ]);
    }

}
