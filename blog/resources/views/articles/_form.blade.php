<div class="space-y-8">

    {{-- Title Input --}}
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
            {{ __('Titre') }} <span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $article->title ?? '') }}"
            placeholder="Ex: Mon Super Article"
            class="block w-full rounded-lg border-gray-300 py-3 px-4 text-base shadow-sm
                   focus:border-indigo-500 focus:ring-indigo-500
                   @error('title') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
        >

        @error('title')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Slug Input --}}
    <div>
        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
            {{ __('Slug') }}
        </label>

        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500">/</span>

            <input
                type="text"
                name="slug"
                id="slug"
                value="{{ old('slug', $article->slug ?? '') }}"
                placeholder="mon-super-article"
                class="block w-full rounded-lg border-gray-300 py-3 pl-8 pr-4 text-base shadow-sm
                       focus:border-indigo-500 focus:ring-indigo-500
                       @error('slug') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
            >
        </div>

        @error('slug')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Excerpt Input --}}
    <div>
        <div class="flex justify-between items-center mb-2">
            <label for="excerpt" class="block text-sm font-medium text-gray-700">
                {{ __('Extrait') }}
            </label>
            <span class="text-xs text-gray-500">Optionnel</span>
        </div>

        <input
            type="text"
            name="excerpt"
            id="excerpt"
            value="{{ old('excerpt', $article->excerpt ?? '') }}"
            placeholder="Une courte description pour les moteurs de recherche"
            class="block w-full rounded-lg border-gray-300 py-3 px-4 text-base shadow-sm
                   focus:border-indigo-500 focus:ring-indigo-500
                   @error('excerpt') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
        >

        @error('excerpt')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Content Textarea --}}
    <div>
        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
            {{ __('Contenu') }}
        </label>

        <textarea
            id="content"
            name="content"
            rows="12"
            placeholder="Rédigez votre article ici..."
            class="block w-full rounded-lg border-gray-300 py-3 px-4 text-base shadow-sm
                   focus:border-indigo-500 focus:ring-indigo-500
                   @error('content') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
        >{{ old('content', $article->content ?? '') }}</textarea>

        @error('content')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

</div>
