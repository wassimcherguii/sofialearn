@props([
    'title' => null,
    'subtitle' => null,
    'primaryButton' => ['text' => 'Get Started', 'url' => '#'],
    'secondaryButton' => ['text' => 'Learn More', 'url' => '#'],
    'backgroundImage' => null,
    'showStats' => true
])

<section class="sofia-hero" @if($backgroundImage) style="background-image: url('{{ $backgroundImage }}'); background-size: cover; background-position: center;" @endif>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="sofia-hero-content">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div class="sofia-animate-fade-in-up">
                    <h1 class="sofia-hero-title">
                        {!! $title ?? (app()->getLocale() === 'ar' ? 'تعلم اللغات بطريقة <span class="sofia-text-gradient">أنيقة</span>' : 'Learn Languages with <span class="sofia-text-gradient">Elegance</span>') !!}
                    </h1>
                    <p class="sofia-hero-subtitle">
                        {!! $subtitle ?? (app()->getLocale() === 'ar' ? 'اكتشف طريقة أنيقة لتعلم اللغات. دورات تفاعلية، تتبع التقدم، دردشة فورية، وتقييمات شاملة في تجربة متعددة اللغات.' : 'Discover an elegant way to learn languages. Interactive courses, progress tracking, real-time chat, and comprehensive assessments in a refined multilingual experience.') !!}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ $primaryButton['url'] }}" class="sofia-btn sofia-btn-primary sofia-btn-lg sofia-animate-delay-1">
                            {{ app()->getLocale() === 'ar' ? ($primaryButton['text'] ?? 'ابدأ الآن') : ($primaryButton['text'] ?? 'Get Started') }}
                        </a>
                        <a href="{{ $secondaryButton['url'] }}" class="sofia-btn sofia-btn-secondary sofia-btn-lg sofia-animate-delay-2">
                            {{ app()->getLocale() === 'ar' ? ($secondaryButton['text'] ?? 'اعرف المزيد') : ($secondaryButton['text'] ?? 'Learn More') }}
                        </a>
                    </div>
                </div>

                <!-- Visual/Image -->
                <div class="sofia-animate-fade-in-up sofia-animate-delay-3">
                    <div class="relative">
                        <!-- Main illustration placeholder -->
                        <div class="bg-gradient-to-br from-crimson-50 to-orange-50 rounded-2xl p-8 shadow-2xl">
                            <div class="text-center">
                                <div class="w-32 h-32 bg-crimson-500 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                    {{ app()->getLocale() === 'ar' ? 'ابدأ رحلتك التعليمية' : 'Start Your Learning Journey' }}
                                </h3>
                                <p class="text-gray-600">
                                    {{ app()->getLocale() === 'ar' ? 'انضم إلى آلاف الطلاب حول العالم' : 'Join thousands of students worldwide' }}
                                </p>
                            </div>
                        </div>
                        
                        <!-- Floating elements -->
                        <div class="absolute -top-4 -right-4 w-20 h-20 bg-emerald-500 rounded-full opacity-20 animate-pulse"></div>
                        <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-violet-500 rounded-full opacity-20 animate-pulse" style="animation-delay: 1s;"></div>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            @if($showStats)
            <div class="mt-16 sofia-animate-fade-in-up sofia-animate-delay-3">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-crimson-600 mb-2">10K+</div>
                        <div class="text-gray-600">{{ app()->getLocale() === 'ar' ? 'طالب نشط' : 'Active Students' }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-emerald-600 mb-2">500+</div>
                        <div class="text-gray-600">{{ app()->getLocale() === 'ar' ? 'دورة متاحة' : 'Available Courses' }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-violet-600 mb-2">50+</div>
                        <div class="text-gray-600">{{ app()->getLocale() === 'ar' ? 'لغة مدعومة' : 'Supported Languages' }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-amber-600 mb-2">98%</div>
                        <div class="text-gray-600">{{ app()->getLocale() === 'ar' ? 'معدل الرضا' : 'Satisfaction Rate' }}</div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>


