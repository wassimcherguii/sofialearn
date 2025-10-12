<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Sofia Learning') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-crimson-600 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">Sofia Learning</a>
                </div>
                
                <div class="flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse space-x-reverse' : 'flex-row' }} space-x-4">
                    
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-crimson-600 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-crimson-600 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-crimson-600 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">Login</a>
                        <a href="{{ route('register') }}" class="bg-crimson-600 text-white px-4 py-2 rounded-md hover:bg-crimson-700">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-center' }}">
            <p>&copy; {{ date('Y') }} Sofia Learning. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 