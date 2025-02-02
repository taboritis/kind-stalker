<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\SwaggerController;
use App\Http\Controllers\UploadController;
use App\Http\Middleware\BasicAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(BasicAuthMiddleware::class)->group(function () {
    Route::post('/upload', UploadController::class);
    Route::get('/download', DownloadController::class);
});
