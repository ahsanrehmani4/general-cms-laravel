<?php

namespace App\Http\Requests\Blog;

use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable', File::types(['png', 'jpg', 'jpeg'])->max(1024)],
            'heading' => ['required', 'min:3', 'max:140'],
            'title' => ['required', 'unique:blogs,title,' . $this->id],
            'sub_title' => ['nullable'],
            'category' => ['required', 'distinct'],
            'quote' => ['nullable', 'max:420'],
            'description' => ['required', 'max:10000'],
        ];
    }
}
