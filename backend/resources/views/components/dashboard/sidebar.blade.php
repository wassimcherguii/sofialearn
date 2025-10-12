@php
$navigationItems = [
    [
        'url' => '#',
        'label' => app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Dashboard',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>',
        'active_pattern' => 'admin/dashboard'
    ],
    [
        'url' => '#',
        'label' => app()->getLocale() === 'ar' ? 'الدورات التدريبية' : 'Courses',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
        'active_pattern' => 'courses'
    ],
    [
        'url' => '#',
        'label' => app()->getLocale() === 'ar' ? 'المستخدمين' : 'Users',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>',
        'active_pattern' => 'users'
    ],
    [
        'url' => '#',
        'label' => app()->getLocale() === 'ar' ? 'الإحصائيات' : 'Analytics',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>',
        'active_pattern' => 'analytics'
    ],
    [
        'url' => '#',
        'label' => app()->getLocale() === 'ar' ? 'الإعدادات' : 'Settings',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>',
        'active_pattern' => 'settings'
    ]
];
@endphp

<div id="sidebar" class="sofia-sidebar fixed md:relative top-0 h-full z-40 md:translate-x-0 {{ app()->getLocale() === 'ar' ? 'right-0' : 'left-0' }} {{ app()->getLocale() === 'ar' ? 'translate-x-full md:translate-x-0' : '-translate-x-full md:translate-x-0' }}" data-collapsed="false">
    <div class="flex flex-col h-full">
        <!-- User Section -->
        <div class="p-4 border-b border-gray-200">
            <div class="flex items-center space-x-3 rtl-reverse">
                <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                    <span class="text-emerald-600 font-semibold text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                </div>
                <div class="sidebar-user-info">
                    <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-2">
            @foreach($navigationItems as $item)
                <a href="{{ $item['url'] }}" class="sofia-nav-item {{ request()->is($item['active_pattern']) ? 'active' : '' }}">
                    <svg class="sofia-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $item['icon'] !!}
                    </svg>
                    <span class="sidebar-text transition-all duration-300">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
        
        <!-- Collapse Button -->
        <div class="p-4 border-t border-gray-200">
            <button id="toggleSidebar" class="w-full flex items-center justify-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/>
                </svg>
            </button>
        </div>
    </div>
</div>

