<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    public function testUpload()
    {
        $image = HttpUploadedFile::fake()->image('rangga.jpg');
        $this->post('/file/upload', ['picture' => $image])->assertSeeText('OK : rangga.jpg');
    }
}
