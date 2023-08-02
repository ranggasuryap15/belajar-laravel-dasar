<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    public function testGetEnv()
    {
        $appName = env('YOUTUBE');
        self::assertEquals('Generus Koding', $appName);
    }

    public function testDefaultEnv()
    {
        $author = env('AUTHOR', 'Rangga'); // parameter kedua adalah nilai default

        self::assertEquals('Rangga', $author);
    }
}
