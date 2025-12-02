@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            {{ __('Dashboard') }}
        </h1>
        <p class="mt-2 text-sm text-gray-600">
            Welcome to your personal dashboard.
        </p>
    </div>

    <div class="bg-white overflow-hidden shadow-md sm:rounded-xl">
        <div class="p-8">
            
            {{-- Flash Message --}}
            @if (session('status'))
                <div class="mb-6 rounded-md bg-green-50 p-4 border-l-4 border-green-400">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
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

            {{-- Main Content --}}
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center">
                        <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-900">
                        {{ __('Success!') }}
                    </h3>
                    <p class="text-gray-600">
                        {{ __('You are logged in!') }}
                    </p>
                </div>
            </div>

            {{-- Optional Action Buttons --}}
            <div class="mt-8 pt-6 border-t border-gray-100 flex gap-4">
                <a href="{{ url('/') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                    Return Home
                </a>
                
                {{-- If you have articles or an admin panel --}}
                {{-- 
                <a href="{{ route('articles.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                    View Articles
                </a> 
                --}}
            </div>

        </div>
    </div>
</div>
@endsection