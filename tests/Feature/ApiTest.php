<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_city_unauthenticated()
    {
        $this->json('GET', 'search/cities/?id=1', ['Accept' => 'application/json'])
        ->assertStatus(401)->assertJson([
            "message" => "Unauthenticated."
        ]);
    }

    public function test_province_unauthenticated()
    {
        $this->json('GET', 'search/provinces/?id=1', ['Accept' => 'application/json'])
        ->assertStatus(401)->assertJson([
            "message" => "Unauthenticated."
        ]);
    }
}
