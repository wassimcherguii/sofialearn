<!DOCTYPE html>
<html lang="ar" dir="rtl" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>لوحة التحكم 4 - سوفيا ليرن</title>
    <meta name="description" content="لوحة تحكم إدارية باللغة العربية مع دعم RTL شامل">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Arabic Font Stack */
        html {
            font-family: 'Noto Sans Arabic', 'Cairo', 'Tajawal', 'Amiri', 'Scheherazade New', sans-serif;
        }
        
        /* RTL Sidebar positioning */
        .sidebar-hidden {
            transform: translateX(100%) !important;
        }
        
        .main-content-expanded {
            margin-inline-start: 0 !important;
            margin-inline-end: 4rem !important;
        }
        
        /* RTL Sidebar positioning and visibility */
        #sidebar {
            right: 0 !important;
            left: auto !important;
            border-inline-start: 1px solid #e5e7eb !important;
            border-inline-end: none !important;
        }
        
        /* Ensure sidebar is visible in RTL */
        #sidebar:not(.sidebar-hidden) {
            transform: translateX(0) !important;
        }
        
        /* RTL Top navbar */
        header {
            flex-direction: row-reverse !important;
        }
        
        /* RTL User actions */
        .user-actions {
            flex-direction: row-reverse !important;
        }
        
        /* RTL Text alignment */
        .text-left {
            text-align: right !important;
        }
        
        /* RTL Navigation */
        .sidebar-nav a {
            flex-direction: row-reverse !important;
        }
        
        .sidebar-nav a svg {
            margin-inline-end: 0 !important;
            margin-inline-start: 0.75rem !important;
        }
        
        /* RTL Mobile sidebar */
        @media (max-width: 768px) {
            .sidebar-hidden {
                transform: translateX(100%) !important;
            }
            
            .main-content {
                margin-inline-end: 0 !important;
            }
            
            /* Ensure mobile sidebar positioning in RTL */
            #sidebar {
                right: 0 !important;
                left: auto !important;
            }
        }
        
        /* Arabic specific styling */
        .arabic-text {
            font-family: 'Noto Sans Arabic', 'Cairo', 'Tajawal', 'Amiri', 'Scheherazade New', sans-serif;
            line-height: 1.8;
        }
        
        /* RTL Cards */
        .rtl-card {
            direction: rtl;
            text-align: right;
        }
        
        /* RTL Table */
        .rtl-table {
            direction: rtl;
        }
        
        .rtl-table th,
        .rtl-table td {
            text-align: right;
        }
    </style>
</head>
<body class="h-full bg-gray-50 arabic-text">
    <div class="flex flex-col h-full">
        <!-- Top Navbar -->
        <header class="bg-white shadow-sm border-b border-gray-100 px-4 py-3 flex items-center justify-between" role="banner">
            <!-- Logo Section -->
            <div class="flex items-center">
                <!-- Mobile menu button -->
                <button id="openSidebar" class="md:hidden p-2 rounded-lg hover:bg-gray-100 ms-2">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Logo -->
                <div class="flex items-center space-x-3 space-x-reverse">
                    <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800">سوفيا ليرن</h1>
                        <p class="text-xs text-gray-500">لوحة التحكم 4</p>
                    </div>
                </div>
            </div>
    
            <!-- User Actions -->
            <div class="flex items-center space-x-4 space-x-reverse user-actions">
                <!-- User Profile -->
                <div class="flex items-center space-x-3 space-x-reverse">
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
                    <button type="submit" class="p-2 rounded-lg hover:bg-gray-100 text-gray-600" title="تسجيل الخروج">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Content Area -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <div id="sidebar" class="w-64 bg-white shadow-lg border-gray-100 fixed md:relative top-0 h-full z-40 md:translate-x-0 right-0 border-l translate-x-full md:translate-x-0" data-collapsed="false">
                <div class="flex flex-col h-full">
                    <!-- Navigation -->
                    <nav class="flex-1 px-4 py-6 space-y-2 sidebar-nav">
                        <a href="#" class="flex items-center px-4 py-3 text-emerald-600 bg-emerald-50 rounded-xl font-medium group">
                            <svg class="w-5 h-5 ms-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300">لوحة التحكم</span>
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors group">
                            <svg class="w-5 h-5 ms-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300">الدورات التدريبية</span>
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors group">
                            <svg class="w-5 h-5 ms-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300">المستخدمين</span>
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors group">
                            <svg class="w-5 h-5 ms-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300">الإحصائيات</span>
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors group">
                            <svg class="w-5 h-5 ms-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300">الإعدادات</span>
                        </a>
                    </nav>
                </div>
            </div>
            
            <!-- Main Content -->
            <div id="mainContent" class="flex-1 flex flex-col">
                <main class="flex-1 p-6">
                    <!-- Arabic Content -->
                    <div class="max-w-7xl mx-auto">
                        <div class="mb-8">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                                مرحباً بك في لوحة التحكم 4
                            </h1>
                            <p class="text-gray-600">
                                لوحة تحكم إدارية مصممة خصيصاً للغة العربية مع دعم RTL شامل
                            </p>
                        </div>

                        <!-- Arabic Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                            <div class="bg-white rounded-lg shadow p-6 rtl-card">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center ms-4">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            إحصائيات المستخدمين
                                        </h3>
                                        <p class="text-gray-600">
                                            إجمالي عدد المستخدمين المسجلين في النظام
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-lg shadow p-6 rtl-card">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center ms-4">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            الدورات المكتملة
                                        </h3>
                                        <p class="text-gray-600">
                                            عدد الدورات التي تم إكمالها بنجاح
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-lg shadow p-6 rtl-card">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center ms-4">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            التقييمات الإيجابية
                                        </h3>
                                        <p class="text-gray-600">
                                            معدل التقييمات الإيجابية من الطلاب
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Arabic Table -->
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    قائمة المستخدمين النشطين
                                </h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 rtl-table">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                الاسم الكامل
                                            </th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                البريد الإلكتروني
                                            </th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                نوع المستخدم
                                            </th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                الحالة
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                أحمد محمد علي
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                ahmed@example.com
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                طالب
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                    نشط
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                فاطمة السيد حسن
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                fatima@example.com
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                مدرس
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    متاح
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                محمد عبد الرحمن
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                mohamed@example.com
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                إداري
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    معلق
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Arabic Quick Actions -->
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">الإجراءات السريعة</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <button class="bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow text-right">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="font-medium text-gray-900">إضافة دورة جديدة</h4>
                                            <p class="text-sm text-gray-500">إنشاء دورة تدريبية جديدة</p>
                                        </div>
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                            </svg>
                                        </div>
                                    </div>
                                </button>

                                <button class="bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow text-right">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="font-medium text-gray-900">إدارة المستخدمين</h4>
                                            <p class="text-sm text-gray-500">عرض وتعديل بيانات المستخدمين</p>
                                        </div>
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </button>

                                <button class="bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow text-right">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="font-medium text-gray-900">التقارير والإحصائيات</h4>
                                            <p class="text-sm text-gray-500">عرض تقارير مفصلة عن الأداء</p>
                                        </div>
                                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </button>

                                <button class="bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow text-right">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="font-medium text-gray-900">إعدادات النظام</h4>
                                            <p class="text-sm text-gray-500">تكوين إعدادات النظام العامة</p>
                                        </div>
                                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden"></div>

    <script>
        // Mobile sidebar functionality
        const openSidebar = document.getElementById('openSidebar');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('sidebar-hidden');
            overlay.classList.remove('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('sidebar-hidden');
            overlay.classList.add('hidden');
        });

        // RTL functionality
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('rtl-mode');
        });
    </script>
</body>
</html>

