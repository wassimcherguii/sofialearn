<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - SofiaLearn</title>
    <meta name="description" content="Admin dashboard for SofiaLearn e-learning platform">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom styles for admin dashboard -->
    <style>
        .paper-texture {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><defs><pattern id="paper" patternUnits="userSpaceOnUse" width="100" height="100"><rect width="100" height="100" fill="%23fefcf8"/><path d="M0 20h100M0 40h100M0 60h100M0 80h100" stroke="%23f0f0f0" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23paper)"/></svg>');
        }
        
        .sidebar-transition {
            transition: all 0.3s ease-in-out;
        }
        
        .sidebar-hidden {
            transform: translateX(-100%);
        }
        
        .sidebar-collapsed {
            width: 4rem;
        }
        
        .sidebar-collapsed .sidebar-text {
            display: none;
        }
        
        .sidebar-collapsed .sidebar-user-info {
            display: none;
        }
        
        .sidebar-collapsed nav a {
            justify-content: center;
            padding: 0.75rem;
        }
        
        .sidebar-collapsed nav a svg {
            margin-right: 0;
        }
        
        .sidebar-collapsed .user-section .flex {
            justify-content: center;
        }
        
        .sidebar-collapsed .user-section .w-10 {
            margin: 0 auto;
        }
        
        .main-content-expanded {
            margin-left: 4rem;
        }
        
        /* RTL Support - Enhanced and Clean */
        html[dir="rtl"] .sidebar-hidden {
            transform: translateX(100%) !important;
        }
        
        html[dir="rtl"] .main-content-expanded {
            margin-left: 0 !important;
            margin-right: 4rem !important;
        }
        
        /* RTL Navbar - Reverse order */
        html[dir="rtl"] header {
            flex-direction: row-reverse !important;
        }
        
        /* RTL Logo box - Keep normal order (burger first, then logo) */
        html[dir="rtl"] .logo-box {
            flex-direction: row !important;
        }
        
        /* RTL Logo section - Keep normal order */
        html[dir="rtl"] .logo-section {
            flex-direction: row !important;
        }
        
        /* RTL User actions - Reverse order */
        html[dir="rtl"] .flex.items-center.space-x-4 {
            flex-direction: row-reverse !important;
        }
        
        /* RTL Text alignment */
        html[dir="rtl"] .text-left {
            text-align: right !important;
        }
        
        /* RTL Margins for burger buttons - Convert mr to ml */
        html[dir="rtl"] .mr-3 {
            margin-right: 0 !important;
            margin-left: 0.75rem !important;
        }
        
        html[dir="rtl"] .mr-2 {
            margin-right: 0 !important;
            margin-left: 0.5rem !important;
        }
        
        /* RTL Sidebar navigation icons */
        html[dir="rtl"] nav a svg {
            margin-right: 0 !important;
            margin-left: 0.75rem !important;
        }
        
        /* RTL Stats cards text alignment */
        html[dir="rtl"] .bg-white .text-left {
            text-align: right !important;
        }
        
        /* RTL Quick actions grid */
        html[dir="rtl"] .grid.md\\:grid-cols-2 .group {
            flex-direction: row-reverse !important;
        }
        
        html[dir="rtl"] .grid.md\\:grid-cols-2 .group .mr-4 {
            margin-right: 0 !important;
            margin-left: 1rem !important;
        }
        
        /* RTL Recent activity */
        html[dir="rtl"] .space-y-4 .flex {
            flex-direction: row-reverse !important;
        }
        
        html[dir="rtl"] .space-y-4 .flex .space-x-3 {
            flex-direction: row-reverse !important;
        }
        
        /* RTL Dropdown positioning */
        html[dir="rtl"] #languageDropdownMenu {
            right: auto !important;
            left: 0 !important;
        }
        
        /* Debug: Show current locale and RTL status */
        html[dir="rtl"]::before {
            content: "RTL MODE ACTIVE";
            position: fixed;
            top: 0;
            left: 0;
            background: red;
            color: white;
            padding: 4px 8px;
            font-size: 12px;
            z-index: 9999;
        }
        
        @media (min-width: 768px) {
            .sidebar-hidden {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="h-full paper-texture">
    <div class="flex flex-col h-full">
        <!-- Top Navbar - Full Width -->
        <header class="bg-white shadow-sm border-b border-gray-100 px-4 py-3 flex items-center justify-between">
            <!-- Logo Box (Sidebar Width) - Will be on right in RTL -->
            <div class="flex items-center w-64 logo-box">
                <!-- Desktop toggle button -->
                <button id="toggleSidebar" class="hidden md:block p-2 rounded-lg hover:bg-gray-100 mr-3 burger-button">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Mobile menu button -->
                <button id="openSidebar" class="md:hidden p-2 rounded-lg hover:bg-gray-100 mr-2 burger-button">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Logo -->
                <div class="flex items-center space-x-3 logo-section">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mb-1">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </div>
                        <div class="w-12 h-1 bg-emerald-600 rounded-full"></div>
                    </div>
                    <div class="sidebar-logo-text transition-all duration-300">
                        <h1 class="text-lg font-bold text-gray-800">LA PLUME</h1>
                        <p class="text-xs text-gray-500">Admin Panel</p>
                    </div>
                </div>
            </div>
    
            <!-- User Info & Actions - Will be on left in RTL -->
            <div class="flex items-center space-x-4">
                <div class="text-left">
                    <h1 class="text-xl font-bold text-gray-800">{{ __('pages.admin.dashboard.title') }}</h1>
                    <p class="text-sm text-gray-500">{{ __('pages.admin.dashboard.welcome', ['name' => auth()->user()->name]) }}</p>
                </div>

                <!-- Notifications -->
                <button class="p-2 rounded-lg hover:bg-gray-100 relative">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12.828 7H4.828z"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                </button>

                <!-- Language Dropdown -->
                <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300" id="languageDropdownButton" data-dropdown-toggle="languageDropdownMenu" aria-expanded="false">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3h1m1 0h5m0 0v5m0-5-6 6M3 11h4m3 0h7M3 15h7"/></svg>
                    @php($__names = ['fr' => 'Français', 'en' => 'English', 'ar' => 'العربية'])
                    <span class="hidden sm:inline">{{ $__names[app()->getLocale()] ?? strtoupper(app()->getLocale()) }}</span>
                </button>
                <!-- Dropdown menu -->
                <div id="languageDropdownMenu" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 right-0">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="languageDropdownButton">
                        <li>
                            <button type="button" data-locale="fr" class="w-full flex items-center justify-between text-left px-4 py-2 hover:bg-gray-100" aria-selected="{{ app()->getLocale()==='fr' ? 'true' : 'false' }}">
                                <span>Français</span>
                                @if(app()->getLocale()==='fr')
                                <svg class="w-4 h-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                @endif
                            </button>
                        </li>
                        <li>
                            <button type="button" data-locale="en" class="w-full flex items-center justify-between text-left px-4 py-2 hover:bg-gray-100" aria-selected="{{ app()->getLocale()==='en' ? 'true' : 'false' }}">
                                <span>English</span>
                                @if(app()->getLocale()==='en')
                                <svg class="w-4 h-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                @endif
                            </button>
                        </li>
                        <li>
                            <button type="button" data-locale="ar" class="w-full flex items-center justify-between text-left px-4 py-2 hover:bg-gray-100" aria-selected="{{ app()->getLocale()==='ar' ? 'true' : 'false' }}">
                                <span>العربية</span>
                                @if(app()->getLocale()==='ar')
                                <svg class="w-4 h-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                @endif
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Hidden form to switch locale -->
                <form id="locale-switch-form" method="POST" action="{{ route('locale.switch') }}" class="hidden">
                    @csrf
                    <input type="hidden" name="locale" id="locale-input" value="{{ app()->getLocale() }}">
                </form>
            </div>
        </header>

        <!-- Main Content Area -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <div id="sidebar" class="w-64 bg-white shadow-lg {{ app()->getLocale() === 'ar' ? 'border-l' : 'border-r' }} border-gray-100 sidebar-transition md:translate-x-0 sidebar-hidden fixed md:relative top-0 {{ app()->getLocale() === 'ar' ? 'right-0' : 'left-0' }} h-full z-40" data-collapsed="false">
                <div class="flex flex-col h-full">
                    <!-- Navigation -->
                    <nav class="flex-1 px-4 py-6 space-y-2">
                        <a href="#" class="flex items-center px-4 py-3 text-emerald-600 bg-emerald-50 rounded-xl font-medium group">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300">{{ __('pages.admin.dashboard.navigation.dashboard') }}</span>
                            <div class="sidebar-collapsed-tooltip absolute left-full ml-2 px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50">
                                {{ __('pages.admin.dashboard.navigation.dashboard') }}
                            </div>
                        </a>
                        
                        <a href="{{ route('courses.index') }}" class="flex items-center px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors group relative">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300">{{ __('pages.admin.dashboard.navigation.courses') }}</span>
                            <div class="sidebar-collapsed-tooltip absolute left-full ml-2 px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50">
                                {{ __('pages.admin.dashboard.navigation.courses') }}
                            </div>
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors group relative">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300">{{ __('pages.admin.dashboard.navigation.users') }}</span>
                            <div class="sidebar-collapsed-tooltip absolute left-full ml-2 px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50">
                                {{ __('pages.admin.dashboard.navigation.users') }}
                            </div>
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors group relative">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300">{{ __('pages.admin.dashboard.navigation.analytics') }}</span>
                            <div class="sidebar-collapsed-tooltip absolute left-full ml-2 px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50">
                                {{ __('pages.admin.dashboard.navigation.analytics') }}
                            </div>
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors group relative">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300">{{ __('pages.admin.dashboard.navigation.settings') }}</span>
                            <div class="sidebar-collapsed-tooltip absolute left-full ml-2 px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50">
                                {{ __('pages.admin.dashboard.navigation.settings') }}
                            </div>
                        </a>
                    </nav>

                    <!-- User Section -->
                    <div class="p-4 border-t border-gray-100 user-section">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-emerald-600 font-semibold text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                            <div class="flex-1 min-w-0 sidebar-user-info transition-all duration-300 text-left">
                                <p class="text-sm font-medium text-gray-800 truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-xl transition-colors group relative">
                                <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                            <span class="sidebar-text transition-all duration-300">{{ __('pages.admin.dashboard.navigation.logout') }}</span>
                            <div class="sidebar-collapsed-tooltip absolute left-full ml-2 px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50">
                                {{ __('pages.admin.dashboard.navigation.logout') }}
                            </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div id="mainContent" class="flex-1 flex flex-col sidebar-transition">

            <!-- Main Content Area -->
            <main class="flex-1 p-4 md:p-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-2xl shadow-lg shadow-gray-100/50 border border-gray-100 p-6 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} justify-between">
                            <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                <p class="text-sm font-medium text-gray-600 mb-1">{{ __('pages.admin.dashboard.stats.total_users') }}</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['total_users'] ?? 0 }}</p>
                            </div>
                            <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-emerald-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            {{ __('pages.admin.dashboard.stats.growth', ['percentage' => 12]) }}
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg shadow-gray-100/50 border border-gray-100 p-6 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} justify-between">
                            <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                <p class="text-sm font-medium text-gray-600 mb-1">{{ __('pages.admin.dashboard.stats.total_courses') }}</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['total_courses'] ?? 0 }}</p>
                            </div>
                            <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-red-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            {{ __('pages.admin.dashboard.stats.growth', ['percentage' => 8]) }}
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg shadow-gray-100/50 border border-gray-100 p-6 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} justify-between">
                            <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                <p class="text-sm font-medium text-gray-600 mb-1">{{ __('pages.admin.dashboard.stats.enrollments') }}</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['total_enrollments'] ?? 0 }}</p>
                            </div>
                            <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-amber-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            {{ __('pages.admin.dashboard.stats.growth', ['percentage' => 15]) }}
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg shadow-gray-100/50 border border-gray-100 p-6 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} justify-between">
                            <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                <p class="text-sm font-medium text-gray-600 mb-1">{{ __('pages.admin.dashboard.stats.active_users') }}</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['active_users'] ?? 0 }}</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-blue-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            {{ __('pages.admin.dashboard.stats.growth', ['percentage' => 5]) }}
                        </div>
                    </div>
                </div>

                <!-- Content Grid -->
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Quick Actions -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl shadow-lg shadow-gray-100/50 border border-gray-100 p-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ __('pages.admin.dashboard.quick_actions.title') }}</h2>
                            <div class="grid md:grid-cols-2 gap-4">
                                <a href="{{ route('courses.index') }}" class="group flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} p-6 bg-emerald-50 hover:bg-emerald-100 rounded-xl transition-all duration-300">
                                    <div class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }} group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 group-hover:text-emerald-700">{{ __('pages.admin.dashboard.quick_actions.manage_courses') }}</h3>
                                        <p class="text-sm text-gray-600">{{ __('pages.admin.dashboard.quick_actions.manage_courses_desc') }}</p>
                                    </div>
                                </a>

                                <a href="#" class="group flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} p-6 bg-red-50 hover:bg-red-100 rounded-xl transition-all duration-300">
                                    <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }} group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 group-hover:text-red-700">{{ __('pages.admin.dashboard.quick_actions.manage_users') }}</h3>
                                        <p class="text-sm text-gray-600">{{ __('pages.admin.dashboard.quick_actions.manage_users_desc') }}</p>
                                    </div>
                                </a>

                                <a href="#" class="group flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} p-6 bg-amber-50 hover:bg-amber-100 rounded-xl transition-all duration-300">
                                    <div class="w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }} group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 group-hover:text-amber-700">{{ __('pages.admin.dashboard.quick_actions.analytics') }}</h3>
                                        <p class="text-sm text-gray-600">{{ __('pages.admin.dashboard.quick_actions.analytics_desc') }}</p>
                                    </div>
                                </a>

                                <a href="#" class="group flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} p-6 bg-blue-50 hover:bg-blue-100 rounded-xl transition-all duration-300">
                                    <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }} group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 group-hover:text-blue-700">{{ __('pages.admin.dashboard.quick_actions.settings') }}</h3>
                                        <p class="text-sm text-gray-600">{{ __('pages.admin.dashboard.quick_actions.settings_desc') }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-lg shadow-gray-100/50 border border-gray-100 p-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ __('pages.admin.dashboard.recent_activity.title') }}</h2>
                            <div class="space-y-4">
                                <div class="flex items-start {{ app()->getLocale() === 'ar' ? 'flex-row-reverse space-x-reverse' : 'flex-row' }} space-x-3">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full mt-2"></div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">{{ __('pages.admin.dashboard.recent_activity.system_status') }}</p>
                                        <p class="text-xs text-gray-600">{{ __('pages.admin.dashboard.recent_activity.system_status_desc') }}</p>
                                        <p class="text-xs text-gray-400">{{ __('pages.admin.dashboard.recent_activity.time_ago.minutes', ['count' => 2]) }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start {{ app()->getLocale() === 'ar' ? 'flex-row-reverse space-x-reverse' : 'flex-row' }} space-x-3">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                    <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                        <p class="text-sm font-medium text-gray-800">{{ __('pages.admin.dashboard.recent_activity.new_user') }}</p>
                                        <p class="text-xs text-gray-600">{{ __('pages.admin.dashboard.recent_activity.new_user_desc', ['name' => 'John Doe']) }}</p>
                                        <p class="text-xs text-gray-400">{{ __('pages.admin.dashboard.recent_activity.time_ago.minutes', ['count' => 15]) }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start {{ app()->getLocale() === 'ar' ? 'flex-row-reverse space-x-reverse' : 'flex-row' }} space-x-3">
                                    <div class="w-2 h-2 bg-amber-500 rounded-full mt-2"></div>
                                    <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                        <p class="text-sm font-medium text-gray-800">{{ __('pages.admin.dashboard.recent_activity.course_update') }}</p>
                                        <p class="text-xs text-gray-600">{{ __('pages.admin.dashboard.recent_activity.course_update_desc') }}</p>
                                        <p class="text-xs text-gray-400">{{ __('pages.admin.dashboard.recent_activity.time_ago.hours', ['count' => 1]) }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start {{ app()->getLocale() === 'ar' ? 'flex-row-reverse space-x-reverse' : 'flex-row' }} space-x-3">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mt-2"></div>
                                    <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                        <p class="text-sm font-medium text-gray-800">{{ __('pages.admin.dashboard.recent_activity.maintenance') }}</p>
                                        <p class="text-xs text-gray-600">{{ __('pages.admin.dashboard.recent_activity.maintenance_desc') }}</p>
                                        <p class="text-xs text-gray-400">{{ __('pages.admin.dashboard.recent_activity.time_ago.hours', ['count' => 2]) }}</p>
                                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </main>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden"></div>

    <script>
        // Sidebar toggle functionality
        const openSidebar = document.getElementById('openSidebar');
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const overlay = document.getElementById('sidebarOverlay');
        const logoBox = document.querySelector('.flex.items-center.w-64');

        // Mobile sidebar functionality
        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('sidebar-hidden');
            overlay.classList.remove('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('sidebar-hidden');
            overlay.classList.add('hidden');
        });

        // Desktop sidebar collapse/expand functionality
        toggleSidebar.addEventListener('click', () => {
            const isCollapsed = sidebar.getAttribute('data-collapsed') === 'true';
            
            if (isCollapsed) {
                // Expand sidebar
                sidebar.classList.remove('sidebar-collapsed');
                sidebar.setAttribute('data-collapsed', 'false');
            } else {
                // Collapse sidebar
                sidebar.classList.add('sidebar-collapsed');
                sidebar.setAttribute('data-collapsed', 'true');
            }
        });

        // Close sidebar on window resize if mobile
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('sidebar-hidden');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.add('sidebar-hidden');
                // Reset to expanded state on desktop
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('sidebar-collapsed');
                    sidebar.setAttribute('data-collapsed', 'false');
                }
            }
        });

        // Handle Flowbite language dropdown selection
        const dropdown = document.getElementById('languageDropdownMenu');
        if (dropdown) {
            dropdown.querySelectorAll('button[data-locale]')?.forEach(btn => {
                btn.addEventListener('click', () => {
                    const locale = btn.getAttribute('data-locale');
                    const input = document.getElementById('locale-input');
                    const form = document.getElementById('locale-switch-form');
                    if (locale && input && form) {
                        input.value = locale;
                        form.submit();
                    }
                });
            });
        }
    </script>
</body>
</html>
