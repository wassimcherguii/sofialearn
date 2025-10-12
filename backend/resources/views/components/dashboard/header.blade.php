<header class="bg-white shadow-sm border-b border-gray-100 px-4 py-3 flex items-center justify-between" role="banner">
    <!-- Logo Section -->
    <div class="flex items-center">
        <!-- Mobile menu button -->
        <button id="openSidebar" class="md:hidden p-2 rounded-lg hover:bg-gray-100 rtl-margin-end">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Logo -->
        <div class="flex items-center space-x-3 rtl-reverse">
            <div class="w-8 h-8 bg-crimson-500 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-lg font-bold text-gray-800">@yield('page-title', 'SofiaLearn')</h1>
                <p class="text-xs text-gray-500">@yield('page-subtitle', 'Dashboard')</p>
            </div>
        </div>
    </div>

    <!-- User Actions -->
    <div class="flex items-center space-x-4 rtl-reverse user-actions">
        <!-- Language Dropdown -->
        @include('components.dashboard.language-switcher')
        
        <!-- User Profile -->
        @include('components.dashboard.user-profile')
        
        <!-- Notifications -->
        @include('components.dashboard.notifications')
    </div>
</header>

