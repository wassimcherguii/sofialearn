<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - Sofia Learning</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Flowbite Navbar for Login Page Only -->
    <nav class="bg-white border-b border-gray-200 dark:bg-gray-900">
        <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ __('pages.admin.login.site_name') }}</span>
            </a>
            <div class="flex items-center md:order-2">
                <!-- Language Dropdown -->
                <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-blue-800" id="languageDropdownButton" data-dropdown-toggle="languageDropdownMenu" aria-expanded="false">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3h1m1 0h5m0 0v5m0-5-6 6M3 11h4m3 0h7M3 15h7"/></svg>
                    @php($__names = ['fr' => 'Français', 'en' => 'English', 'ar' => 'العربية'])
                    <span class="hidden sm:inline">{{ $__names[app()->getLocale()] ?? strtoupper(app()->getLocale()) }}</span>
                </button>
                <!-- Dropdown menu -->
                <div id="languageDropdownMenu" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-800 dark:divide-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="languageDropdownButton">
                        <li>
                            <button type="button" data-locale="fr" class="w-full flex items-center justify-between text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700" aria-selected="{{ app()->getLocale()==='fr' ? 'true' : 'false' }}">
                                <span>Français</span>
                                @if(app()->getLocale()==='fr')
                                <svg class="w-4 h-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                @endif
                            </button>
                        </li>
                        <li>
                            <button type="button" data-locale="en" class="w-full flex items-center justify-between text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700" aria-selected="{{ app()->getLocale()==='en' ? 'true' : 'false' }}">
                                <span>English</span>
                                @if(app()->getLocale()==='en')
                                <svg class="w-4 h-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                @endif
                            </button>
                        </li>
                        <li>
                            <button type="button" data-locale="ar" class="w-full flex items-center justify-between text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700" aria-selected="{{ app()->getLocale()==='ar' ? 'true' : 'false' }}">
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
        </div>
    </nav>

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <!-- Logo -->
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <!-- Header -->
                <div class="text-center">
                    <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 md:text-3xl dark:text-white mb-2">
                        {{ __('pages.admin.login.title') }}
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ __('pages.admin.login.portal') }}
                    </p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg dark:bg-red-900/20 dark:border-red-800 dark:text-red-400">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="hidden" name="redirect_to" value="{{ route('admin.dashboard') }}">
                    
                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('pages.admin.login.email_label') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                   placeholder="{{ __('pages.admin.login.email_placeholder') }}" 
                                   required>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('pages.admin.login.password_label') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   placeholder="{{ __('pages.admin.login.password_placeholder') }}" 
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                   required>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" 
                                   aria-describedby="remember" 
                                   type="checkbox" 
                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                            <label for="remember" class="ml-2 text-sm text-gray-500 dark:text-gray-300">
                                {{ __('pages.admin.login.remember_me') }}
                            </label>
                        </div>
                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">
                            {{ __('pages.admin.login.forgot_password') }}
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('pages.admin.login.submit') }}
                    </button>

                    <!-- Back to Main Site -->
                    <div class="text-center">
                        <a href="{{ route('home') }}" 
                           class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            ← {{ __('pages.admin.login.back_to_main') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} Sofia Learning. All rights reserved.
            </p>
        </div>
    </div>

    <!-- JavaScript for Flowbite functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
</body>
</html>
