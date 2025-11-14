<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title'   => ['required','string','min:3','max:150'],
            'slug'    => ['nullable','string','max:180','unique:articles,slug'],
            'excerpt' => ['nullable','string','max:255'],
            'content' => ['nullable','string'],
        ];
    }
}
