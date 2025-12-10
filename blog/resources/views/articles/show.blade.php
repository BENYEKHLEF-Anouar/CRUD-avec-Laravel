@extends('layouts.app')
@section('content')
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Article Header --}}
    <div class="mb-8 text-center">
      <h1 class="text-4xl font-extrabold text-gray-900 leading-tight mb-4">
        {{ $article->title }}
      </h1>

      <div class="flex items-center justify-center text-sm text-gray-500 space-x-4">
        <span class="flex items-center">
          <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          {{ $article->user->name ?? 'Auteur inconnu' }}
        </span>
        <span>&bull;</span>
        <span class="flex items-center">
          <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          {{ $article->created_at->format('d M Y') }}
        </span>
        <span>&bull;</span>
        <span class="flex items-center">
          <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
          {{ $article->views }} vues
        </span>
      </div>
    </div>

    {{-- Article Content --}}
    <article class="prose prose-indigo prose-lg mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
      @if($article->excerpt)
        <div class="text-xl text-gray-600 font-medium italic mb-8 pl-4 border-l-4 border-indigo-500">
          {{ $article->excerpt }}
        </div>
      @endif

      <div class="text-gray-800 leading-relaxed space-y-4">
        {{-- Preserving newlines for simple text content --}}
        {!! nl2br(e($article->content)) !!}
      </div>
    </article>

    {{-- Back Link --}}
    <div class="mt-12 text-center">
      <a href="{{ route('articles.index') }}"
        class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-semibold transition duration-150">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Retour aux articles
      </a>
    </div>

  </div>
@endsection