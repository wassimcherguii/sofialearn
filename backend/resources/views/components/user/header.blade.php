<nav class="sofia-nav" id="mainNav">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="sofia-nav-brand">
                    <div class="flex items-center space-x-2 rtl-reverse">
                        <div class="w-8 h-8 bg-crimson-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </div>
                        <span>SofiaLearn</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8 rtl-reverse">
                <a href="#features" class="sofia-nav-link">{{ app()->getLocale() === 'ar' ? 'المميزات' : 'Features' }}</a>
                <a href="#courses" class="sofia-nav-link">{{ app()->getLocale() === 'ar' ? 'الدورات' : 'Courses' }}</a>
                <a href="#about" class="sofia-nav-link">{{ app()->getLocale() === 'ar' ? 'حولنا' : 'About' }}</a>
                <a href="#contact" class="sofia-nav-link">{{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact' }}</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4 rtl-reverse">
                @auth
                    <a href="{{ route('dashboard') }}" class="sofia-btn sofia-btn-secondary">
                        {{ app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Dashboard' }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="sofia-nav-link">
                            {{ app()->getLocale() === 'ar' ? 'تسجيل الخروج' : 'Logout' }}
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="sofia-nav-link">
                        {{ app()->getLocale() === 'ar' ? 'تسجيل الدخول' : 'Login' }}
                    </a>
                    <a href="{{ route('register') }}" class="sofia-btn sofia-btn-primary">
                        {{ app()->getLocale() === 'ar' ? 'ابدأ الآن' : 'Get Started' }}
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-crimson-500" id="mobile-menu-button">
                    <span class="sr-only">{{ app()->getLocale() === 'ar' ? 'فتح القائمة الرئيسية' : 'Open main menu' }}</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200">
            <a href="#features" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-crimson-600 hover:bg-gray-50">
                {{ app()->getLocale() === 'ar' ? 'المميزات' : 'Features' }}
            </a>
            <a href="#courses" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-crimson-600 hover:bg-gray-50">
                {{ app()->getLocale() === 'ar' ? 'الدورات' : 'Courses' }}
            </a>
            <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-crimson-600 hover:bg-gray-50">
                {{ app()->getLocale() === 'ar' ? 'حولنا' : 'About' }}
            </a>
            <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-crimson-600 hover:bg-gray-50">
                {{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact' }}
            </a>
            <div class="border-t border-gray-200 pt-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-crimson-600 hover:bg-gray-50">
                        {{ app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Dashboard' }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-crimson-600 hover:bg-gray-50">
                            {{ app()->getLocale() === 'ar' ? 'تسجيل الخروج' : 'Logout' }}
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-crimson-600 hover:bg-gray-50">
                        {{ app()->getLocale() === 'ar' ? 'تسجيل الدخول' : 'Login' }}
                    </a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-crimson-600 hover:text-crimson-500 hover:bg-gray-50">
                        {{ app()->getLocale() === 'ar' ? 'ابدأ الآن' : 'Get Started' }}
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>


