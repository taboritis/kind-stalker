<?php

namespace App\Http\Controllers;

class DownloadController extends Controller
{
    public function __invoke()
    {
        $path = storage_path('images/lastImage.jpg');

        return response()->file($path);
    }
}
