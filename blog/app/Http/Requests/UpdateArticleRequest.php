<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UpdateArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
        ]);
    }

    public function rules(): array
    {
        $article = $this->route('article');

        return [
            'title'   => ['required', 'string', 'min:3', 'max:150'],
            'slug'    => [
                'required',
                'string',
                'max:180',
                Rule::unique('articles', 'slug')->ignore($article)
            ],
            'content' => ['required', 'string', 'min:20'],
        ];
    }

    public function messages(): array
    {
        return [
            'slug.unique' => 'Ce slug est déjà pris par un autre article.',
        ];
    }
}
