@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-8">
    
    {{-- Centered Card Container --}}
    <div class="max-w-3xl w-full mx-auto bg-white rounded-xl shadow-xl overflow-hidden">
        
        {{-- Card Header --}}
        <div class="bg-gray-50 px-8 py-6 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    {{ __('Créer un article') }}
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Rédigez un nouveau contenu pour votre audience.
                </p>
            </div>
            
            {{-- Close/Back Icon --}}
            <a href="{{ route('articles.index') }}" class="text-gray-400 hover:text-gray-600 transition duration-150">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        {{-- Form Content --}}
        <div class="p-8">
            <form method="POST" action="{{ route('articles.store') }}" novalidate class="space-y-6">
                @csrf
                
                {{-- Form Partial Wrapper --}}
                <div class="space-y-6">
                    @include('articles._form')
                </div>

                {{-- Action Buttons --}}
                <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-3">
                    {{-- Cancel Button --}}
                    <a href="{{ route('articles.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        {{ __('Annuler') }}
                    </a>

                    {{-- Create Button --}}
                    <button type="submit" class="inline-flex items-center px-6 py-2 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        {{ __('Créer') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection