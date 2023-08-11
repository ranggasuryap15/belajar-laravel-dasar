<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    public function getCookie(Request $request): JsonResponse
    {
        return response()
            ->json([
                'userId' => $request->cookie('user-id', 'guest'),
                'isMember' => $request->cookie('is-member', 'false')
            ]);
    }
}
