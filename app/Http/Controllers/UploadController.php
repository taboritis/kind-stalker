<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Services\UploadService;
use Illuminate\Http\JsonResponse;

class UploadController extends Controller
{
    public function __construct(private readonly UploadService $uploadService)
    {
    }

    public function __invoke(UploadRequest $request): mixed
    {
        $this->uploadService->upload($request);

        return new JsonResponse([], 201);
    }
}
