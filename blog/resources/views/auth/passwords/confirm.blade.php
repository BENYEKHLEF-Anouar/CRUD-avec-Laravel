@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-2xl">
        
        {{-- Header Section --}}
        <div class="text-center">
            {{-- Optional: Lock Icon for visual context --}}
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 mb-4">
                <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            
            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                {{ __('Confirm Password') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Please confirm your password before continuing.') }}
            </p>
        </div>

        <form class="mt-8 space-y-6" method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="space-y-5">
                {{-- Password Input --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Password') }}
                    </label>
                    <input id="password" type="password" 
                        class="block w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white transition duration-200 ease-in-out sm:text-sm @error('password') border-red-500 ring-red-200 @enderror" 
                        name="password" required autocomplete="current-password" placeholder="••••••••">
                    
                    @error('password')
                        <p class="text-red-500 text-xs mt-1 flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    {{ __('Confirm Password') }}
                </button>
            </div>

            {{-- Forgot Password Link --}}
            @if (Route::has('password.request'))
                <div class="text-center mt-4">
                    <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline transition duration-150 ease-in-out text-sm">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection