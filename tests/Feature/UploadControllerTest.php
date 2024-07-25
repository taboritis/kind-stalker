<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UploadControllerTest extends TestCase
{
    #[Test]
    public function it_has_to_be_authenticated(): void
    {
        $this->post('/upload', ['lastImage' => UploadedFile::fake()->image('image.jpg')])
            ->assertStatus(401);
    }


    #[Test]
    public function it_returns_201(): void
    {
        $this->withHeaders([
            'Authorization' => 'Basic ' . base64_encode('adrian:lubie-placki'),
        ]);

        $this->post('/upload', ['lastImage' => UploadedFile::fake()->image('image.jpg')])
            ->assertStatus(201);
    }

    #[Test]
    public function it_returns_422_if_payload_is_not_given(): void
    {
        $this->withHeaders([
            'Authorization' => 'Basic ' . base64_encode('adrian:lubie-placki'),
        ]);
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->post('/upload')
            ->assertStatus(422);
    }

    #[Test]
    public function it_returns_422_if_payload_is_incorrect(): void
    {
        $this->withHeaders([
            'Authorization' => 'Basic ' . base64_encode('adrian:lubie-placki'),
        ]);

        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->post('/upload', ['lastImage' => 'base64:dedaedead'])
            ->assertStatus(422);
    }
}
