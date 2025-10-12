@props([
    'title' => null,
    'subtitle' => null,
    'features' => null
])

@php
$defaultFeatures = [
    [
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
        'title' => app()->getLocale() === 'ar' ? 'دورات تفاعلية' : 'Interactive Courses',
        'description' => app()->getLocale() === 'ar' ? 'تعلم من خلال دورات تفاعلية مصممة خصيصاً لتحسين تجربة التعلم' : 'Learn through interactive courses designed to enhance your learning experience'
    ],
    [
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>',
        'title' => app()->getLocale() === 'ar' ? 'تتبع التقدم' : 'Progress Tracking',
        'description' => app()->getLocale() === 'ar' ? 'راقب تقدمك في التعلم مع تقارير مفصلة وإحصائيات دقيقة' : 'Track your learning progress with detailed reports and accurate statistics'
    ],
    [
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>',
        'title' => app()->getLocale() === 'ar' ? 'دردشة فورية' : 'Real-time Chat',
        'description' => app()->getLocale() === 'ar' ? 'تواصل مع المعلمين والطلاب الآخرين في الوقت الفعلي' : 'Connect with teachers and other students in real-time'
    ],
    [
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
        'title' => app()->getLocale() === 'ar' ? 'تقييمات شاملة' : 'Comprehensive Assessments',
        'description' => app()->getLocale() === 'ar' ? 'اختبر معرفتك من خلال تقييمات شاملة ومتنوعة' : 'Test your knowledge through comprehensive and diverse assessments'
    ],
    [
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
        'title' => app()->getLocale() === 'ar' ? 'دعم 24/7' : '24/7 Support',
        'description' => app()->getLocale() === 'ar' ? 'احصل على الدعم في أي وقت من فريقنا المتخصص' : 'Get support anytime from our specialized team'
    ],
    [
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>',
        'title' => app()->getLocale() === 'ar' ? 'أمان عالي' : 'High Security',
        'description' => app()->getLocale() === 'ar' ? 'بياناتك محمية بأعلى معايير الأمان والخصوصية' : 'Your data is protected with the highest security and privacy standards'
    ]
];

$features = $features ?? $defaultFeatures;
@endphp

<section id="features" class="sofia-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="sofia-section-title">
                {!! $title ?? (app()->getLocale() === 'ar' ? 'لماذا تختار <span class="sofia-text-gradient">سوفيا ليرن</span>؟' : 'Why Choose <span class="sofia-text-gradient">SofiaLearn</span>?') !!}
            </h2>
            <p class="sofia-section-subtitle">
                {!! $subtitle ?? (app()->getLocale() === 'ar' ? 'اكتشف المميزات التي تجعل من سوفيا ليرن الخيار الأمثل لتعلم اللغات' : 'Discover the features that make SofiaLearn the perfect choice for language learning') !!}
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($features as $index => $feature)
            <div class="sofia-card sofia-card-feature sofia-animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                <div class="sofia-card-feature-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $feature['icon'] !!}
                    </svg>
                </div>
                <h3 class="sofia-card-feature-title">{{ $feature['title'] }}</h3>
                <p class="sofia-card-feature-description">{{ $feature['description'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Additional Info -->
        <div class="mt-16 text-center">
            <div class="bg-gradient-to-r from-crimson-50 to-orange-50 rounded-2xl p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    {{ app()->getLocale() === 'ar' ? 'جاهز للبدء؟' : 'Ready to Get Started?' }}
                </h3>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                    {{ app()->getLocale() === 'ar' ? 'انضم إلى آلاف الطلاب الذين يثقون في سوفيا ليرن لتعلم اللغات بطريقة فعالة وممتعة' : 'Join thousands of students who trust SofiaLearn for effective and enjoyable language learning' }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#courses" class="sofia-btn sofia-btn-primary sofia-btn-lg">
                        {{ app()->getLocale() === 'ar' ? 'استكشف الدورات' : 'Explore Courses' }}
                    </a>
                    <a href="#contact" class="sofia-btn sofia-btn-secondary sofia-btn-lg">
                        {{ app()->getLocale() === 'ar' ? 'تواصل معنا' : 'Contact Us' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


