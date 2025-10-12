@props([
    'title' => null,
    'subtitle' => null,
    'primaryButton' => ['text' => 'Get Started', 'url' => '#'],
    'secondaryButton' => ['text' => 'Learn More', 'url' => '#'],
    'background' => 'gradient',
    'size' => 'default'
])

@php
$sizeClasses = [
    'small' => 'py-12',
    'default' => 'py-16',
    'large' => 'py-24'
];

$backgroundClasses = [
    'gradient' => 'sofia-bg-gradient',
    'secondary' => 'sofia-bg-gradient-secondary',
    'hero' => 'sofia-bg-gradient-hero',
    'dark' => 'bg-gray-900',
    'light' => 'bg-gray-50'
];
@endphp

<section class="sofia-section {{ $sizeClasses[$size] ?? $sizeClasses['default'] }} {{ $backgroundClasses[$background] ?? $backgroundClasses['gradient'] }} {{ $background === 'dark' ? 'text-white' : '' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 {{ $background === 'dark' ? 'text-white' : 'text-gray-900' }}">
                {!! $title ?? (app()->getLocale() === 'ar' ? 'ابدأ رحلتك التعليمية <span class="sofia-text-gradient">اليوم</span>' : 'Start Your Learning Journey <span class="sofia-text-gradient">Today</span>') !!}
            </h2>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto {{ $background === 'dark' ? 'text-gray-300' : 'text-gray-600' }}">
                {!! $subtitle ?? (app()->getLocale() === 'ar' ? 'انضم إلى مجتمع من آلاف المتعلمين الناجحين واكتشف قوة التعلم التفاعلي' : 'Join a community of thousands of successful learners and discover the power of interactive learning') !!}
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ $primaryButton['url'] }}" class="sofia-btn {{ $background === 'dark' ? 'sofia-btn-outline' : 'sofia-btn-primary' }} sofia-btn-lg">
                    {{ app()->getLocale() === 'ar' ? ($primaryButton['text'] ?? 'ابدأ الآن') : ($primaryButton['text'] ?? 'Get Started') }}
                </a>
                <a href="{{ $secondaryButton['url'] }}" class="sofia-btn {{ $background === 'dark' ? 'sofia-btn-secondary' : 'sofia-btn-outline' }} sofia-btn-lg">
                    {{ app()->getLocale() === 'ar' ? ($secondaryButton['text'] ?? 'اعرف المزيد') : ($secondaryButton['text'] ?? 'Learn More') }}
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="mt-12 pt-8 border-t {{ $background === 'dark' ? 'border-gray-700' : 'border-gray-200' }}">
                <p class="text-sm {{ $background === 'dark' ? 'text-gray-400' : 'text-gray-500' }} mb-6">
                    {{ app()->getLocale() === 'ar' ? 'يثق بنا آلاف الطلاب حول العالم' : 'Trusted by thousands of students worldwide' }}
                </p>
                <div class="flex flex-wrap justify-center items-center gap-8 opacity-60">
                    <!-- Placeholder for company logos -->
                    <div class="w-24 h-8 bg-gray-300 rounded"></div>
                    <div class="w-24 h-8 bg-gray-300 rounded"></div>
                    <div class="w-24 h-8 bg-gray-300 rounded"></div>
                    <div class="w-24 h-8 bg-gray-300 rounded"></div>
                    <div class="w-24 h-8 bg-gray-300 rounded"></div>
                </div>
            </div>
        </div>
    </div>
</section>


