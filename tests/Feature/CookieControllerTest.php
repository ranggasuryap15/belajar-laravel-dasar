<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    public function testCreateCookie()
    {
        $this->get('/cookie/set')
            ->assertCookie('User-Id', 'Rangga')
            ->assertCookie('Is-Member', 'true');

            // tidak perlu menggunakan decrypt lagi, karena sudah otomatis.
    }
}
