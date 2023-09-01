<?php

namespace Tests\Feature;

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

    public function testGetCookie()
    {
        $this->withCookie('User-Id', 'Rangga')
            ->withCookie('Is-Member', 'true')
            ->get('/cookie/get')
            ->assertJson([
                'userId' => 'Rangga',
                'isMember' => 'true'
            ]);
    }
}
