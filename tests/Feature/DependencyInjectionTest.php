<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{
    public function testDependencyInjection()
    {
        $foo = new Foo();
        $bar = new Bar($foo); // memasukkan parameter dari class Foo disebut dengan DependencyInjection karena Bar bergantung dengan Foo
        // di dalam $bar sudah ada construct, jadi tidak perlu membuat objeknya lagi disini

        self::assertEquals('Foo And Bar', $bar->bar());
    }
}
