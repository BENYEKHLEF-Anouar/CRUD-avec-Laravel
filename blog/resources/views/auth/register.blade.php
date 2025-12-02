@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-2xl">
        
        {{-- Header Section --}}
        <div class="text-center">
            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                {{ __('Create an Account') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Join us to get started today
            </p>
        </div>

        <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="space-y-5">
                
                {{-- Name Input --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Name') }}
                    </label>
                    <input id="name" type="text" 
                        class="block w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white transition duration-200 ease-in-out sm:text-sm @error('name') border-red-500 ring-red-200 @enderror" 
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="John Doe">
                    
                    @error('name')
                        <p class="text-red-500 text-xs mt-1 flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email Input --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Email Address') }}
                    </label>
                    <input id="email" type="email" 
                        class="block w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white transition duration-200 ease-in-out sm:text-sm @error('email') border-red-500 ring-red-200 @enderror" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="you@example.com">
                    
                    @error('email')
                        <p class="text-red-500 text-xs mt-1 flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password Input --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Password') }}
                    </label>
                    <input id="password" type="password" 
                        class="block w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white transition duration-200 ease-in-out sm:text-sm @error('password') border-red-500 ring-red-200 @enderror" 
                        name="password" required autocomplete="new-password" placeholder="••••••••">
                    
                    @error('password')
                        <p class="text-red-500 text-xs mt-1 flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Confirm Password Input --}}
                <div>
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Confirm Password') }}
                    </label>
                    <input id="password-confirm" type="password" 
                        class="block w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white transition duration-200 ease-in-out sm:text-sm" 
                        name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                </div>
            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    {{ __('Register') }}
                </button>
            </div>

            {{-- Optional: Login Link --}}
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">
                        Log in
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection