<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\UploadedImageRequestInterface;
use Illuminate\Support\Facades\File;

class UploadService
{
    public function upload(UploadedImageRequestInterface $request): void
    {
        $file = $request->getImage();

        File::put(storage_path('images/lastImage.jpg'), $file->get());
    }
}
