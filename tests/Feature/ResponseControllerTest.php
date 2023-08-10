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

    public function testView()
    {
        $this->get('/response/type/view')
        ->assertSeeText('Hello Rangga');
    }

    public function testJsonView()
    {
        $this->get('/response/type/json')
        ->assertJson([
            'firstName' => 'Rangga',
            'lastName' => 'Prayoga'
        ]);
    }

    public function testFile()
    {
        $this->get('/response/type/file')
        ->assertHeader('Content-Type', 'image/jpeg');
    }
    public function testDownload()
    {
        $this->get('/response/type/download')
        ->assertDownload('rangga.jpg');
    }
}
