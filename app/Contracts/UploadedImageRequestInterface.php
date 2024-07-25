<?php

declare(strict_types=1);

namespace App\Contracts;

interface UploadedImageRequestInterface
{
    public function getImage();
}
