<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SofiaLearn - Learn Languages Online')</title>
    <meta name="description" content="@yield('description', 'Discover an elegant way to learn languages. Interactive courses, progress tracking, real-time chat, and comprehensive assessments in a refined multilingual experience.')">
    <meta name="keywords" content="@yield('keywords', 'language learning, online courses, interactive learning, multilingual, SofiaLearn')">
    
    @vite(['resources/css/app.css', 'resources/css/user.css', 'resources/js/app.js', 'resources/js/user.js'])
    
    @stack('styles')
</head>
<body class="h-full bg-white {{ app()->getLocale() === 'ar' ? 'rtl-mode' : '' }}">
    <!-- Header -->
    @include('components.user.header')
    
    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('components.user.footer')
    
    @stack('scripts')
</body>
</html>


