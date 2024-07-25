<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DownloadFileTest extends TestCase
{
    #[Test]
    public function it_can_download_last_file(): void
    {
        $this->withHeaders([
            'Authorization' => 'Basic ' . base64_encode('adrian:lubie-placki'),
        ]);

        File::copy(
            base_path('tests/Feature/fixtures/lastImage.jpeg'),
            storage_path('images/lastImage.jpg')
        );

        $this->get('/download')
            ->assertStatus(200);
    }

    #[Test]
    public function it_return_401_when_unauthenticated(): void
    {
        File::copy(
            base_path('tests/Feature/fixtures/lastImage.jpeg'),
            storage_path('images/lastImage.jpg')
        );

        $this->get('/download')
            ->assertStatus(401);
    }

    #[Test]
    public function it_returns_404_as_user_is_unauthorized(): void
    {
        $this->withHeaders([
            'Authorization' => 'Basic ' . base64_encode('adrian:wrong-password'),
        ]);

        File::copy(
            base_path('tests/Feature/fixtures/lastImage.jpeg'),
            storage_path('images/lastImage.jpg')
        );

        $this->get('/download')
            ->assertStatus(403);
    }
}
