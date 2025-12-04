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
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js (For dropdowns and interactivity) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">
    <div id="app" class="min-h-screen flex flex-col">

        {{-- Navbar --}}
        <nav x-data="{ mobileMenuOpen: false, profileOpen: false }" class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    
                    {{-- Left side (Logo) --}}
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center gap-2 text-2xl font-bold text-indigo-600 hover:text-indigo-500 transition duration-150">
                            {{-- Optional Logo Icon --}}
                            {{-- <i class="fa-solid fa-layer-group"></i> --}}
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    {{-- Right side (Desktop) --}}
                    <div class="hidden sm:flex items-center space-x-6">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-indigo-600 transition duration-150">
                                    {{ __('Login') }}
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                                    {{ __('Register') }}
                                </a>
                            @endif
                        @else
                            {{-- Role Badges & Greeting --}}
                            <div class="flex items-center space-x-4 border-r border-gray-200 pr-4">
                                <span class="text-sm text-gray-600">
                                    Bonjour, <span class="font-semibold text-gray-900">{{ Auth::user()->name }}</span>
                                </span>

                                @if (Auth::user()->is_admin)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-600 border-emerald-400">
                                        Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-100 text-sky-800 border border-sky-200">
                                        Auteur
                                    </span>
                                @endif
                            </div>

                            {{-- User Dropdown --}}
                            <div class="relative ml-3">
                                <div>
                                    <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" type="button" 
                                        class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150" 
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        
                                        {{-- User Icon --}}
                                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-indigo-100 text-indigo-600">
                                            <i class="fa-regular fa-user"></i>
                                        </span>
                                        
                                        {{-- Chevron --}}
                                        <svg class="ml-2 h-4 w-4 text-gray-400 group-hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                {{-- Dropdown Menu --}}
                                <div x-show="profileOpen" 
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="transform opacity-100 scale-100"
                                     x-transition:leave-end="transform opacity-0 scale-95"
                                     class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" 
                                     role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" style="display: none;">
                                    
                                    {{-- Logout Link --}}
                                    <a href="{{ route('logout') }}" 
                                       class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition duration-150" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-arrow-right-from-bracket mr-2 text-gray-400 group-hover:text-indigo-500"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>

                    {{-- Mobile Menu Button --}}
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Open main menu</span>
                            <i class="fa-solid fa-bars h-6 w-6 flex items-center justify-center" :class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }"></i>
                            <i class="fa-solid fa-xmark h-6 w-6 flex items-center justify-center" :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" style="display: none;"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="mobileMenuOpen" class="sm:hidden bg-white border-t border-gray-200" style="display: none;">
                <div class="pt-2 pb-3 space-y-1">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                                {{ __('Login') }}
                            </a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                                {{ __('Register') }}
                            </a>
                        @endif
                    @else
                        <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                            <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                            <div class="mt-2">
                                @if (Auth::user()->is_admin)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">Admin</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-sky-100 text-sky-800">Auteur</span>
                                @endif
                            </div>
                        </div>
                        <div class="mt-3 space-y-1">
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-indigo-600 hover:bg-gray-100">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        {{-- Content --}}
        <main class="flex-grow">
            @yield('content')
        </main>
        
        <!-- {{-- Optional Footer --}}
        <footer class="bg-white border-t border-gray-200 py-6 mt-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400 text-sm">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </div>
        </footer> -->
    </div>
</body>
</html>