@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            {{ __('Espace Auteur') }}
        </h1>
        <p class="mt-2 text-sm text-gray-600">
            {{ __('Manage your articles and view your permissions.') }}
        </p>
    </div>

    {{-- Dashboard Grid (Simplified for Author) --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        
        {{-- Profile Card (Same as Admin Dashboard) --}}
        <div class="lg:col-span-3 bg-white overflow-hidden shadow-md rounded-xl">
            <div class="p-8">
                @auth
                    <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
                        
                        {{-- Avatar / Initials --}}
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-20 w-20 rounded-full bg-indigo-100 ring-4 ring-white shadow-sm">
                                <span class="text-3xl font-bold leading-none text-indigo-700">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </span>
                            </span>
                        </div>

                        {{-- User Details --}}
                        <div class="flex-1 text-center sm:text-left">
                            <h2 class="text-2xl font-bold text-gray-900">
                                {{ Auth::user()->name }}
                            </h2>
                            <p class="text-sm text-gray-500 mb-4">
                                {{ Auth::user()->email }}
                            </p>

                            {{-- Role Badge Logic --}}
                            <div class="flex justify-center sm:justify-start">
                                @if (Auth::user()->is_admin)
                                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                        {{-- Admin Shield Icon --}}
                                        <svg class="mr-1.5 h-4 w-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        Profil détecté : <span class="ml-1 font-bold">Admin</span>
                                    </div>
                                @else
                                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-sky-100 text-sky-800 border border-sky-200">
                                        {{-- Author Pen Icon --}}
                                        <svg class="mr-1.5 h-4 w-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        Profil détecté : <span class="ml-1 font-bold">Auteur</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
            
            {{-- Optional Footer Area (Visual Flourish) --}}
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100">
                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">
                    Status du compte
                </p>
                <div class="mt-2 flex items-center text-sm text-green-600">
                    <span class="h-2 w-2 bg-green-500 rounded-full mr-2"></span>
                    Actif
                </div>
            </div>
        </div>
    </div>

    {{-- Article Management Table --}}
    @auth
        @if (!Auth::user()->is_admin) {{-- Only for Authors --}}
            <div class="mt-8">
                <div class="sm:flex sm:items-center sm:justify-between mb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ __('Gérer mes articles') }}</h2>
                        <p class="mt-1 text-sm text-gray-700">Modifiez ou supprimez vos articles directement depuis cette page.</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        @can('create-article')
                        <a href="{{ route('articles.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Nouvel article
                        </a>
                        @endcan
                    </div>
                </div>
                @include('admin.partials.articles_table', ['articles' => $articles])
            </div>
        @endif
    @endauth
</div>
@endsection