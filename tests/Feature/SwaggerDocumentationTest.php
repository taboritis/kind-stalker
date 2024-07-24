<?php

declare(strict_types=1);

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SwaggerDocumentationTest extends TestCase
{
    #[Test]
    public function test_swagger_documentation_is_accessible(): void
    {
        $this->get('/')
            ->assertStatus(200);
    }
}
