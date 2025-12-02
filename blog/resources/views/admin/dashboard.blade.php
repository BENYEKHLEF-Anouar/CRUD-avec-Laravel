{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-4">Espace d’administration</h1>
        <p class="mb-2">Bienvenue dans l’admin du blog.</p>

        @auth
            <p class="text-sm text-gray-700">
                Utilisateur connecté : {{ Auth::user()->name }}
            </p>
        @endauth
    </div>
@endsection
