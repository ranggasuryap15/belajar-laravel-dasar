<?php

namespace Tests\Feature;

use GuzzleHttp\Psr7\Request;
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

    public function testInputAll()
    {
        $this->post('/input/hello/first', ['username' => 'rangga', 'password' => 'rahasia'])
            ->assertSeeText('name')->assertSeeText('first')
            ->assertSeeText('last')->assertSeeText('rangga')
            ->assertSeeText('prayoga');
    }

    public function testFilterExcept()
    {
        $this->post('/input/filter/expcept', ['username' => 'rangga', 'password' => 'rahasia', 'admin' => 'true'])
            ->assertSeeText('rangga')->assertSeeText('rahasia')
            ->assertDontSeeText('admin');
    }

    public function testFilterMerge(Request $request)
    {
        $this->post('/input/filter/merge', ['username' => 'rangga', 'password' => 'rahasia', 'admin' => 'true'])
        ->assertSeeText('rangga')->assertSeeText('rahasia')
        ->assertSeeText('admin')->assertSeeText('false');
    }
}
