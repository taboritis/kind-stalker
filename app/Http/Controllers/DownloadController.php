<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadController extends Controller
{
    public function __invoke(): BinaryFileResponse
    {
        $path = storage_path('images/lastImage.jpg');

        return response()->file($path);
    }
}
