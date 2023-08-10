<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
        $this->get('/response/hello')->assertStatus(200)
            ->assertSeeText('Hello Response');
    }

    public function testHeader()
    {
        $this->get('response/json')->assertStatus(200)
            ->assertSeeText('Rangga')
            ->assertSeeText('Prayoga')
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeader('Author', 'Generus Koding')
            ->assertHeader('App', 'Belajar Laravel');
    }
}
