@extends('layouts.dashboard')

@section('title', app()->getLocale() === 'ar' ? 'لوحة التحكم 5 - سوفيا ليرن' : 'Admin Dashboard 5 - SofiaLearn')
@section('description', app()->getLocale() === 'ar' ? 'لوحة تحكم إدارية مع نظام تصميم موحد' : 'Admin dashboard with centralized theme system')

@section('page-title', app()->getLocale() === 'ar' ? 'لوحة التحكم 5' : 'Admin Dashboard 5')
@section('page-subtitle', app()->getLocale() === 'ar' ? 'نظام تصميم موحد' : 'Centralized Theme')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">
            {{ app()->getLocale() === 'ar' ? 'مرحباً بك في لوحة التحكم 5' : 'Welcome to Dashboard 5' }}
        </h1>
        <p class="text-gray-600">
            {{ app()->getLocale() === 'ar' ? 'نظام تصميم موحد مع عناصر Flowbite' : 'Centralized theme system with Flowbite elements' }}
        </p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="sofia-card">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center rtl-margin-end">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ app()->getLocale() === 'ar' ? 'إجمالي المستخدمين' : 'Total Users' }}
                    </h3>
                    <p class="text-2xl font-bold text-crimson-600">1,234</p>
                </div>
            </div>
        </div>

        <div class="sofia-card">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center rtl-margin-end">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ app()->getLocale() === 'ar' ? 'الدورات المكتملة' : 'Completed Courses' }}
                    </h3>
                    <p class="text-2xl font-bold text-emerald-600">567</p>
                </div>
            </div>
        </div>

        <div class="sofia-card">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center rtl-margin-end">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ app()->getLocale() === 'ar' ? 'التقييمات الإيجابية' : 'Positive Ratings' }}
                    </h3>
                    <p class="text-2xl font-bold text-violet-600">98%</p>
                </div>
            </div>
        </div>

        <div class="sofia-card">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center rtl-margin-end">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ app()->getLocale() === 'ar' ? 'الإيرادات' : 'Revenue' }}
                    </h3>
                    <p class="text-2xl font-bold text-amber-600">$12.5K</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Cards -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Recent Activity -->
        <div class="sofia-card">
            <div class="sofia-card-header">
                <h2 class="sofia-card-title">
                    {{ app()->getLocale() === 'ar' ? 'النشاط الأخير' : 'Recent Activity' }}
                </h2>
                <p class="sofia-card-subtitle">
                    {{ app()->getLocale() === 'ar' ? 'آخر الأنشطة في النظام' : 'Latest activities in the system' }}
                </p>
            </div>
            <div class="space-y-4">
                <div class="flex items-center space-x-3 rtl-reverse">
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">
                            {{ app()->getLocale() === 'ar' ? 'تم إكمال دورة جديدة' : 'New course completed' }}
                        </p>
                        <p class="text-xs text-gray-500">
                            {{ app()->getLocale() === 'ar' ? 'منذ 5 دقائق' : '5 minutes ago' }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center space-x-3 rtl-reverse">
                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">
                            {{ app()->getLocale() === 'ar' ? 'مستخدم جديد مسجل' : 'New user registered' }}
                        </p>
                        <p class="text-xs text-gray-500">
                            {{ app()->getLocale() === 'ar' ? 'منذ 15 دقيقة' : '15 minutes ago' }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center space-x-3 rtl-reverse">
                    <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">
                            {{ app()->getLocale() === 'ar' ? 'تحديث النظام' : 'System update' }}
                        </p>
                        <p class="text-xs text-gray-500">
                            {{ app()->getLocale() === 'ar' ? 'منذ ساعة' : '1 hour ago' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="sofia-card">
            <div class="sofia-card-header">
                <h2 class="sofia-card-title">
                    {{ app()->getLocale() === 'ar' ? 'الإجراءات السريعة' : 'Quick Actions' }}
                </h2>
                <p class="sofia-card-subtitle">
                    {{ app()->getLocale() === 'ar' ? 'إجراءات سريعة للوصول' : 'Quick access actions' }}
                </p>
            </div>
            <div class="space-y-3">
                <button class="w-full sofia-btn-primary text-left rtl-text-right">
                    <div class="flex items-center space-x-3 rtl-reverse">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span>{{ app()->getLocale() === 'ar' ? 'إضافة دورة جديدة' : 'Add New Course' }}</span>
                    </div>
                </button>
                <button class="w-full sofia-btn-secondary text-left rtl-text-right">
                    <div class="flex items-center space-x-3 rtl-reverse">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                        <span>{{ app()->getLocale() === 'ar' ? 'إدارة المستخدمين' : 'Manage Users' }}</span>
                    </div>
                </button>
                <button class="w-full sofia-btn-success text-left rtl-text-right">
                    <div class="flex items-center space-x-3 rtl-reverse">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <span>{{ app()->getLocale() === 'ar' ? 'عرض التقارير' : 'View Reports' }}</span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="sofia-card">
        <div class="sofia-card-header">
            <h2 class="sofia-card-title">
                {{ app()->getLocale() === 'ar' ? 'قائمة المستخدمين' : 'Users List' }}
            </h2>
            <p class="sofia-card-subtitle">
                {{ app()->getLocale() === 'ar' ? 'جميع المستخدمين المسجلين' : 'All registered users' }}
            </p>
        </div>
        <div class="overflow-x-auto">
            <table class="sofia-table">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="sofia-table th">
                            {{ app()->getLocale() === 'ar' ? 'الاسم' : 'Name' }}
                        </th>
                        <th class="sofia-table th">
                            {{ app()->getLocale() === 'ar' ? 'البريد الإلكتروني' : 'Email' }}
                        </th>
                        <th class="sofia-table th">
                            {{ app()->getLocale() === 'ar' ? 'النوع' : 'Type' }}
                        </th>
                        <th class="sofia-table th">
                            {{ app()->getLocale() === 'ar' ? 'الحالة' : 'Status' }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="sofia-table td font-medium">John Doe</td>
                        <td class="sofia-table td">john@example.com</td>
                        <td class="sofia-table td">Student</td>
                        <td class="sofia-table td">
                            <span class="sofia-badge sofia-badge-success">
                                {{ app()->getLocale() === 'ar' ? 'نشط' : 'Active' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="sofia-table td font-medium">Jane Smith</td>
                        <td class="sofia-table td">jane@example.com</td>
                        <td class="sofia-table td">Teacher</td>
                        <td class="sofia-table td">
                            <span class="sofia-badge sofia-badge-info">
                                {{ app()->getLocale() === 'ar' ? 'متاح' : 'Available' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="sofia-table td font-medium">Ahmed Ali</td>
                        <td class="sofia-table td">ahmed@example.com</td>
                        <td class="sofia-table td">Admin</td>
                        <td class="sofia-table td">
                            <span class="sofia-badge sofia-badge-warning">
                                {{ app()->getLocale() === 'ar' ? 'معلق' : 'Pending' }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Mobile sidebar functionality
    const openSidebar = document.getElementById('openSidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (openSidebar) {
        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('hidden');
            overlay.classList.remove('hidden');
        });
    }

    if (overlay) {
        overlay.addEventListener('click', () => {
            sidebar.classList.add('hidden');
            overlay.classList.add('hidden');
        });
    }

    // Sidebar toggle functionality
    const toggleSidebar = document.getElementById('toggleSidebar');
    if (toggleSidebar) {
        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
    }

    // Language dropdown functionality
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

    // RTL functionality
    document.addEventListener('DOMContentLoaded', function() {
        const isRTL = document.documentElement.dir === 'rtl';
        if (isRTL) {
            document.body.classList.add('rtl-mode');
        }
    });
</script>
@endpush

