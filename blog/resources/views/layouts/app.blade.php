<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js (Required for mobile menu and dropdowns) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div id="app" class="min-h-screen flex flex-col">
        
        {{-- Navigation --}}
        <nav x-data="{ open: false, dropdownOpen: false }" class="bg-white border-b border-gray-200 shadow-sm z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    
                    {{-- Logo --}}
                    <div class="flex">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ url('/') }}" class="text-2xl font-bold text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        </div>
                    </div>

                    {{-- Desktop Menu --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- Authentication Links -->
                        @guest
                            <div class="space-x-4">
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                        {{ __('Login') }}
                                    </a>
                                @endif

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 px-4 py-2 rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out shadow-sm">
                                        {{ __('Register') }}
                                    </a>
                                @endif
                            </div>
                        @else
                            {{-- User Dropdown --}}
                            <div class="ml-3 relative">
                                <div>
                                    <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false" type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 items-center space-x-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="font-medium text-gray-700 hover:text-indigo-600 px-2">
                                            {{ Auth::user()->name }}
                                        </span>
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                {{-- Dropdown Menu --}}
                                <div x-show="dropdownOpen" 
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="transform opacity-100 scale-100"
                                     x-transition:leave-end="transform opacity-0 scale-95"
                                     class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" 
                                     role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" style="display: none;">
                                    
                                    <a href="{{ route('logout') }}" 
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                                       role="menuitem" tabindex="-1" id="user-menu-item-2"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>

                    {{-- Mobile Hamburger Button --}}
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            {{-- Icon when menu is closed --}}
                            <svg :class="{'hidden': open, 'block': ! open }" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            {{-- Icon when menu is open --}}
                            <svg :class="{'block': open, 'hidden': ! open }" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="open" class="sm:hidden bg-white border-t border-gray-200" id="mobile-menu" style="display: none;">
                <div class="pt-2 pb-3 space-y-1">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50">
                                {{ __('Login') }}
                            </a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50">
                                {{ __('Register') }}
                            </a>
                        @endif
                    @else
                        <div class="px-4 py-3 border-b border-gray-200">
                            <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="mt-3 space-y-1">
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        {{-- Main Content --}}
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>