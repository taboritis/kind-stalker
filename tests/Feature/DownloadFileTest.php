<?php

declare(strict_types=1);

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DownloadFileTest extends TestCase
{
    #[Test]
    public function it_can_download_last_file(): void
    {
        $this->markTestIncomplete(__METHOD__);
        $this->get('/images/lastImage/download')
            ->assertStatus(200);
    }
}
