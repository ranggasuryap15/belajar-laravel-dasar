<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        $this->get('/input/hello?name=eko')
            ->assertSeeText('Halo eko');

        $this->get('/input/hello', ['name' => 'eko'])
        ->assertSeeText('Hello eko');
    }

    public function testInputNested()
    {
        $this->post('/input/hello/first', ['name'=> ['first' => 'rangga']])
            ->assertSeeText('Hello rangga');
    }
}
