<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SofiaLearn Dashboard')</title>
    <meta name="description" content="@yield('description', 'SofiaLearn e-learning platform dashboard')">
    
    @vite(['resources/css/app.css', 'resources/css/dashboard.css', 'resources/js/app.js', 'resources/js/dashboard.js'])
    
    @stack('styles')
</head>
<body class="h-full bg-gray-50 {{ app()->getLocale() === 'ar' ? 'rtl-mode' : '' }}">
    <div class="flex flex-col h-full">
        <!-- Top Navbar -->
        @include('components.dashboard.header')
        
        <!-- Main Content Area -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            @include('components.dashboard.sidebar')
            
            <!-- Main Content -->
            <div id="mainContent" class="flex-1 flex flex-col">
                <main class="flex-1 p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    
    <!-- Mobile Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden"></div>
    
    @stack('scripts')
</body>
</html>
