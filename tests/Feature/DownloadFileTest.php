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
        File::copy(
            base_path('tests/Feature/fixtures/lastImage.jpeg'),
            storage_path('images/lastImage.jpg')
        );

        $this->get('/images/lastImage/download')
            ->assertStatus(200);
    }
}
