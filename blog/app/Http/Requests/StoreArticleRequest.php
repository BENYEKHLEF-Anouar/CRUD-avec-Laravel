<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Accès déjà protégé par middleware
    }

    protected function prepareForValidation(): void
    {
        // Générer automatiquement un slug si non fourni
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
        ]);
    }

    public function rules(): array
    {
        return [
            'title'   => ['required','string','min:3','max:150'],
            'slug'    => ['required','string','max:180','unique:articles,slug'],
            'content' => ['required','string','min:20'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'content.min'    => 'Le contenu doit contenir au moins :min caractères.',
            'slug.unique'    => 'Ce slug est déjà utilisé.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title'   => 'titre',
            'slug'    => 'slug',
            'content' => 'contenu',
        ];
    }
}
