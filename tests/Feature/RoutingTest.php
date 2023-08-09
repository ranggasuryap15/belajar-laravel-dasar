<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testBasicRouting()
    {
        $this->get("/pzn")
            ->assertStatus(200)
            ->assertSeeText("Programmer Zaman Now");
    }

    public function testRedirect()
    {
        $this->get('/youtube')
            ->assertRedirect('/pzn');
    }

    public function testFallback()
    {
        $this->get('/404')
            ->assertSeeText('404');
    }

    public function testRouteParameter()
    {
        $this->get('/products/1')
            ->assertSeeText('Product : 1');

        $this->get('/products/2/items/3')
            ->assertSeeText('Product : 2, Item : 3');
    }

    public function testRouteOptionalParameter()
    {
        $this->get('/users/1234')->assertSeeText('Users 1234');
        $this->get('/users')->assertSeeText('Users 404');
    }

    public function testRouteConflict()
    {
        $this->get('/conflict/eko')->assertSeeText('Conflict Eko Khannedy');
        $this->get('/conflict/rudi')->assertSeeText('Conflict rudi');
    }
}
