@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-10 rounded-xl shadow-2xl">
        
        {{-- Header Section with Icon --}}
        <div class="text-center mb-8">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 mb-4">
                <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h2 class="text-2xl font-extrabold text-gray-900">
                {{ __('Verify Your Email Address') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Before proceeding, please check your email for a verification link.') }}
            </p>
        </div>

        {{-- Success Alert --}}
        @if (session('resent'))
            <div class="rounded-md bg-green-50 p-4 mb-6 border-l-4 border-green-400">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Resend Action --}}
        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">
                {{ __('If you did not receive the email') }},
            </p>
            <form class="d-inline mt-2" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline focus:outline-none transition duration-150 ease-in-out">
                    {{ __('click here to request another') }}
                </button>.
            </form>
        </div>
        
    </div>
</div>
@endsection