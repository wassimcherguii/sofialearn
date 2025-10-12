<!-- User Profile -->
<div class="flex items-center space-x-3 rtl-reverse">
    <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
        <span class="text-emerald-600 font-semibold text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
    </div>
    <div class="hidden sm:block">
        <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
        <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
    </div>
</div>

<!-- Logout -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="p-2 rounded-lg hover:bg-gray-100 text-gray-600" title="{{ app()->getLocale() === 'ar' ? 'تسجيل الخروج' : 'Logout' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
        </svg>
    </button>
</form>

