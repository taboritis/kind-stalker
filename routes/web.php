<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::post('/upload', UploadController::class);
Route::get('/images/lastImage/download', DownloadController::class);
