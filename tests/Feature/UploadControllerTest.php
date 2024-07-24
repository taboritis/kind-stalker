<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UploadControllerTest extends TestCase
{
    #[Test]
    public function it_returns_201(): void
    {
        $this->markTestIncomplete(__METHOD__);
        $this->post('/upload', ['lastImage' => UploadedFile::fake()->image('image.jpg')])
            ->assertStatus(201);
    }

    #[Test]
    public function it_returns_422_if_payload_is_not_given(): void
    {
        $this->markTestIncomplete(__METHOD__);
        $this->post('/upload',)
            ->assertStatus(422);
    }

    #[Test]
    public function it_returns_422_if_payload_is_incorrect(): void
    {
        $this->markTestIncomplete(__METHOD__);
        $this->post('/upload', ['lastImage' => 'base64:dedaedead'])
            ->assertStatus(422);
    }
}
