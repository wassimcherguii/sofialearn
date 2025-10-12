<!-- Notifications -->
<div class="relative">
    <button type="button" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg" id="notificationButton" data-dropdown-toggle="notificationDropdown">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12 7H4.828zM4 12h16l-1 1v1a2 2 0 01-2 2H7a2 2 0 01-2-2v-1l-1-1z"/>
        </svg>
        <!-- Notification badge -->
        <span class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
    </button>
    
    <!-- Notification dropdown -->
    <div id="notificationDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-80 absolute end-0 mt-2">
        <div class="px-4 py-3">
            <h3 class="text-lg font-semibold text-gray-900">{{ app()->getLocale() === 'ar' ? 'الإشعارات' : 'Notifications' }}</h3>
        </div>
        <div class="py-2">
            <a href="#" class="flex px-4 py-3 hover:bg-gray-100">
                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 rtl-margin-end"></div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">{{ app()->getLocale() === 'ar' ? 'إشعار جديد' : 'New notification' }}</p>
                    <p class="text-xs text-gray-500">{{ app()->getLocale() === 'ar' ? 'منذ 5 دقائق' : '5 minutes ago' }}</p>
                </div>
            </a>
            <a href="#" class="flex px-4 py-3 hover:bg-gray-100">
                <div class="w-2 h-2 bg-green-500 rounded-full mt-2 rtl-margin-end"></div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">{{ app()->getLocale() === 'ar' ? 'تم إكمال الدورة' : 'Course completed' }}</p>
                    <p class="text-xs text-gray-500">{{ app()->getLocale() === 'ar' ? 'منذ ساعة' : '1 hour ago' }}</p>
                </div>
            </a>
            <a href="#" class="flex px-4 py-3 hover:bg-gray-100">
                <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 rtl-margin-end"></div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">{{ app()->getLocale() === 'ar' ? 'تذكير' : 'Reminder' }}</p>
                    <p class="text-xs text-gray-500">{{ app()->getLocale() === 'ar' ? 'منذ يوم' : '1 day ago' }}</p>
                </div>
            </a>
        </div>
        <div class="px-4 py-2">
            <a href="#" class="text-sm text-blue-600 hover:text-blue-800">{{ app()->getLocale() === 'ar' ? 'عرض الكل' : 'View all' }}</a>
        </div>
    </div>
</div>

