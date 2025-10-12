<!-- Language Dropdown -->
<div class="relative">
    <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300" id="languageDropdownButton" data-dropdown-toggle="languageDropdownMenu">
        <svg class="w-4 h-4 rtl-margin-end" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
        </svg>
        @php($__names = ['fr' => 'Français', 'en' => 'English', 'ar' => 'العربية'])
        <span class="hidden sm:inline">{{ $__names[app()->getLocale()] ?? strtoupper(app()->getLocale()) }}</span>
    </button>
    <!-- Dropdown menu -->
    <div id="languageDropdownMenu" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 absolute end-0">
        <ul class="py-2 text-sm text-gray-700">
            <li>
                <button type="button" data-locale="fr" class="w-full flex items-center justify-between text-left px-4 py-2 hover:bg-gray-100">
                    <span>Français</span>
                    @if(app()->getLocale()==='fr')
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    @endif
                </button>
            </li>
            <li>
                <button type="button" data-locale="en" class="w-full flex items-center justify-between text-left px-4 py-2 hover:bg-gray-100">
                    <span>English</span>
                    @if(app()->getLocale()==='en')
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    @endif
                </button>
            </li>
            <li>
                <button type="button" data-locale="ar" class="w-full flex items-center justify-between text-left px-4 py-2 hover:bg-gray-100">
                    <span>العربية</span>
                    @if(app()->getLocale()==='ar')
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    @endif
                </button>
            </li>
        </ul>
    </div>
</div>

<!-- Hidden form to switch locale -->
<form id="locale-switch-form" method="POST" action="{{ route('locale.switch') }}" class="hidden">
    @csrf
    <input type="hidden" name="locale" id="locale-input" value="{{ app()->getLocale() }}">
</form>

