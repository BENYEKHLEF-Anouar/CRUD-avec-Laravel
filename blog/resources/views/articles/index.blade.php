@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Header & Action --}}
    <div class="sm:flex sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ __('Articles') }}</h1>
            <p class="mt-2 text-sm text-gray-700">Explore all the articles available.</p>
        </div>
        <!-- @can('create-article')
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('articles.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nouvel article
            </a>
        </div>
        @endcan -->
    </div>

    {{-- Flash Message --}}
    @if (session('status'))
    <div class="rounded-md bg-green-50 p-4 mb-6 border-l-4 border-green-400">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                    {{ session('status') }}
                </p>
            </div>
        </div>
    </div>
    @endif

    {{-- Articles Grid --}}
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($articles as $a)
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-2">
                    <a href="{{ route('articles.show', $a) }}" class="hover:text-indigo-600 transition duration-150 ease-in-out">
                        {{ $a->title }}
                    </a>
                </h2>
                <p class="text-sm text-gray-600">
                    {{ Str::limit($a->excerpt, 100) }}
                </p>
                <!-- <div class="mt-4 flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{ $a->views }} vues
                </div> -->
            </div>
        </div>
        @empty
        <div class="lg:col-span-3 px-6 py-10 text-center text-gray-500 bg-white rounded-lg shadow-md">
            <div class="flex flex-col items-center justify-center">
                <svg class="h-12 w-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <p class="text-base font-medium text-gray-900">No articles found</p>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new article.</p>
                <div class="mt-6">
                    <a href="{{ route('articles.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Create New Article
                    </a>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $articles->links() }}
    </div>
</div>
@endsection