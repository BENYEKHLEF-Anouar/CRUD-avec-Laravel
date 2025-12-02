@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-2xl">
        
        {{-- Header Section --}}
        <div class="text-center">
            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                {{ __('Forgot Password?') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Enter your email address and we will send you a link to reset your password.') }}
            </p>
        </div>

        {{-- Success Message --}}
        @if (session('status'))
            <div class="rounded-md bg-green-50 p-4 border-l-4 border-green-400">
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

        <form class="mt-8 space-y-6" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="space-y-5">
                {{-- Email Address --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Email Address') }}
                    </label>
                    <input id="email" type="email" 
                        class="block w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white transition duration-200 ease-in-out sm:text-sm @error('email') border-red-500 ring-red-200 @enderror" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="you@example.com">
                    
                    @error('email')
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
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>

            {{-- Back to Login Link --}}
            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline transition duration-150 ease-in-out text-sm">
                    {{ __('Back to Login') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection