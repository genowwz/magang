<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Complaint Management') }} - @yield('title', 'Home')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-gray-900">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white/90 backdrop-blur-md shadow-sm border-b border-gray-100 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <!-- Logo and primary navigation -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900 hover:text-primary-600 transition-colors duration-300">
                                ComplaintHub
                            </a>
                        </div>
                        <div class="hidden sm:ml-10 sm:flex sm:space-x-8">
                            <a href="{{ route('home') }}" 
                               class="text-gray-600 hover:text-primary-600 px-3 py-2 rounded-lg font-medium text-base transition-all duration-300 {{ request()->routeIs('home') ? 'text-primary-600 bg-primary-50' : 'hover:bg-gray-50' }}">
                                Home
                            </a>
                            <a href="{{ route('complaints.create') }}" 
                               class="text-gray-600 hover:text-primary-600 px-3 py-2 rounded-lg font-medium text-base transition-all duration-300 {{ request()->routeIs('complaints.create') ? 'text-primary-600 bg-primary-50' : 'hover:bg-gray-50' }}">
                                Submit Complaint
                            </a>
                            @auth
                                <a href="{{ route('complaints.index') }}" 
                                   class="text-gray-600 hover:text-primary-600 px-3 py-2 rounded-lg font-medium text-base transition-all duration-300 {{ request()->routeIs('complaints.index') ? 'text-primary-600 bg-primary-50' : 'hover:bg-gray-50' }}">
                                    My Complaints
                                </a>
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}" 
                                       class="text-gray-600 hover:text-primary-600 px-3 py-2 rounded-lg font-medium text-base transition-all duration-300 {{ request()->routeIs('admin.*') ? 'text-primary-600 bg-primary-50' : 'hover:bg-gray-50' }}">
                                        Dashboard
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>

                    <!-- Secondary navigation -->
                    <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                        @auth
                            <!-- User dropdown -->
                            <div class="flex items-center space-x-4">
                                <div class="text-right">
                                    <div class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</div>
                                    <div class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ auth()->user()->title_color }}">
                                        {{ auth()->user()->title }}
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-all duration-300">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('login') }}" class="text-gray-600 hover:text-primary-600 px-4 py-2 rounded-lg font-medium text-base transition-all duration-300 hover:bg-gray-50">
                                    Login
                                </a>
                                <a href="{{ route('register') }}" class="btn-primary">
                                    Register
                                </a>
                            </div>
                        @endauth
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <button type="button" 
                                class="p-2 rounded-lg text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all duration-300"
                                onclick="toggleMobileMenu()">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="sm:hidden hidden bg-white border-t border-gray-100" id="mobile-menu">
                <div class="px-4 pt-4 pb-3 space-y-2">
                    <a href="{{ route('home') }}" class="block px-4 py-3 rounded-lg text-gray-600 hover:text-primary-600 hover:bg-primary-50 font-medium text-base transition-all duration-300 {{ request()->routeIs('home') ? 'text-primary-600 bg-primary-50' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('complaints.create') }}" class="block px-4 py-3 rounded-lg text-gray-600 hover:text-primary-600 hover:bg-primary-50 font-medium text-base transition-all duration-300 {{ request()->routeIs('complaints.create') ? 'text-primary-600 bg-primary-50' : '' }}">
                        Submit Complaint
                    </a>
                    @auth
                        <a href="{{ route('complaints.index') }}" class="block px-4 py-3 rounded-lg text-gray-600 hover:text-primary-600 hover:bg-primary-50 font-medium text-base transition-all duration-300 {{ request()->routeIs('complaints.index') ? 'text-primary-600 bg-primary-50' : '' }}">
                            My Complaints
                        </a>
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg text-gray-600 hover:text-primary-600 hover:bg-primary-50 font-medium text-base transition-all duration-300 {{ request()->routeIs('admin.*') ? 'text-primary-600 bg-primary-50' : '' }}">
                                Dashboard
                            </a>
                        @endif
                    @endauth
                </div>
                
                @auth
                    <div class="px-4 py-4 border-t border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <div class="text-base font-medium text-gray-900">{{ auth()->user()->name }}</div>
                                <div class="text-sm text-gray-500">{{ auth()->user()->email }}</div>
                                <div class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ auth()->user()->title_color }} mt-1">
                                    {{ auth()->user()->title }}
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full px-4 py-3 rounded-lg text-left text-gray-600 hover:text-red-600 hover:bg-red-50 font-medium text-base transition-all duration-300">
                                Sign out
                            </button>
                        </form>
                    </div>
                @else
                    <div class="px-4 py-4 border-t border-gray-100 space-y-2">
                        <a href="{{ route('login') }}" class="block px-4 py-3 rounded-lg text-gray-600 hover:text-primary-600 hover:bg-primary-50 font-medium text-base transition-all duration-300">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="block px-4 py-3 rounded-lg text-white bg-primary-600 hover:bg-primary-700 font-medium text-base transition-all duration-300 text-center">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </nav>

        <!-- Page content -->
        <main class="min-h-screen">
            @if(session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                    <div class="bg-accent-50 border border-accent-200 text-accent-800 px-6 py-4 rounded-xl shadow-sm animate-fade-in" role="alert">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-accent-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                    <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-xl shadow-sm animate-fade-in" role="alert">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-50 border-t border-gray-100 mt-20">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="md:col-span-1">
                        <div class="text-2xl font-bold text-gray-900 mb-4">ComplaintHub</div>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Making complaint resolution simple, transparent, and efficient for everyone.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Platform</h3>
                        <ul class="space-y-3">
                            <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-primary-600 transition-colors duration-300">Home</a></li>
                            <li><a href="{{ route('complaints.create') }}" class="text-gray-600 hover:text-primary-600 transition-colors duration-300">Submit Complaint</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Support</h3>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-gray-600 hover:text-primary-600 transition-colors duration-300">Help Center</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-primary-600 transition-colors duration-300">Contact Us</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Legal</h3>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-gray-600 hover:text-primary-600 transition-colors duration-300">Privacy Policy</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-primary-600 transition-colors duration-300">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <p class="text-gray-500 text-center text-sm">
                        &copy; {{ date('Y') }} ComplaintHub. All rights reserved. Built with care and attention to detail.
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>