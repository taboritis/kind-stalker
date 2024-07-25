<?php

namespace App\Http\Requests;

use App\Contracts\UploadedImageRequestInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class UploadRequest extends FormRequest implements UploadedImageRequestInterface
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'lastImage' => 'required|image',
        ];
    }

    public function getImage(): UploadedFile
    {
        return $this->file('lastImage');
    }
}
