<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_required()
    {
        $this->json('POST', 'api/auth/register', ['Accept' => 'application/json'])
        ->assertStatus(200)->assertJson([
            "name" => ["The name field is required."],
            "email" => ["The email field is required."],
            "password"=> ["The password field is required."]
        ]);
    }

    public function test_register_success()
    {
        $data = [
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'password' => Str::random(10),
        ];
        $this->json('POST', 'api/auth/register', $data, ['Accept' => 'application/json'])
        ->assertStatus(200)->assertJson([
            "message" => "Pendaftaran Berhasil"
        ]);
    }

    public function test_login_unauthorized()
    {
        $this->json('POST', 'api/auth/login', ['Accept' => 'application/json'])
        ->assertStatus(401)->assertJson([
            "error" => "Unauthorized"
        ]);
    }

    public function test_login_success()
    {
        $data = [
            'email' => 'toniasep.mail@gmail.com',
            'password' => 'qwerty123',
        ];
        $this->json('POST', 'api/auth/login', $data, ['Accept' => 'application/json'])
        ->assertStatus(200);
    }
}
