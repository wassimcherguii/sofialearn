@extends('layouts.user')

@section('title', app()->getLocale() === 'ar' ? 'سوفيا ليرن - تعلم اللغات بطريقة أنيقة' : 'SofiaLearn - Learn Languages with Elegance')
@section('description', app()->getLocale() === 'ar' ? 'اكتشف طريقة أنيقة لتعلم اللغات. دورات تفاعلية، تتبع التقدم، دردشة فورية، وتقييمات شاملة في تجربة متعددة اللغات.' : 'Discover an elegant way to learn languages. Interactive courses, progress tracking, real-time chat, and comprehensive assessments in a refined multilingual experience.')
@section('keywords', app()->getLocale() === 'ar' ? 'تعلم اللغات, دورات تفاعلية, تعلم أونلاين, متعدد اللغات, سوفيا ليرن' : 'language learning, interactive courses, online learning, multilingual, SofiaLearn')

@section('content')
<!-- Hero Section -->
@include('components.user.hero', [
    'title' => app()->getLocale() === 'ar' ? 'تعلم اللغات بطريقة <span class="sofia-text-gradient">أنيقة</span>' : 'Learn Languages with <span class="sofia-text-gradient">Elegance</span>',
    'subtitle' => app()->getLocale() === 'ar' ? 'اكتشف طريقة أنيقة لتعلم اللغات. دورات تفاعلية، تتبع التقدم، دردشة فورية، وتقييمات شاملة في تجربة متعددة اللغات.' : 'Discover an elegant way to learn languages. Interactive courses, progress tracking, real-time chat, and comprehensive assessments in a refined multilingual experience.',
    'primaryButton' => ['text' => app()->getLocale() === 'ar' ? 'ابدأ الآن' : 'Get Started', 'url' => route('register')],
    'secondaryButton' => ['text' => app()->getLocale() === 'ar' ? 'اعرف المزيد' : 'Learn More', 'url' => '#features']
])

<!-- Features Section -->
@include('components.user.features')

<!-- Courses Preview Section -->
<section id="courses" class="sofia-section sofia-section-alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="sofia-section-title">
                {{ app()->getLocale() === 'ar' ? 'استكشف دوراتنا' : 'Explore Our Courses' }}
            </h2>
            <p class="sofia-section-subtitle">
                {{ app()->getLocale() === 'ar' ? 'اختر من مجموعة واسعة من الدورات المصممة خصيصاً لاحتياجاتك' : 'Choose from a wide range of courses designed specifically for your needs' }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Course 1 -->
            <div class="sofia-card sofia-animate-fade-in-up">
                <div class="relative mb-6">
                    <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                    </div>
                    <div class="absolute top-4 right-4 bg-crimson-500 text-white px-2 py-1 rounded-full text-sm font-semibold">
                        {{ app()->getLocale() === 'ar' ? 'جديد' : 'New' }}
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    {{ app()->getLocale() === 'ar' ? 'الإنجليزية للمبتدئين' : 'English for Beginners' }}
                </h3>
                <p class="text-gray-600 mb-4">
                    {{ app()->getLocale() === 'ar' ? 'تعلم الأساسيات بطريقة تفاعلية وممتعة' : 'Learn the basics in an interactive and fun way' }}
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-crimson-600">$29</span>
                    <a href="#" class="sofia-btn sofia-btn-primary">
                        {{ app()->getLocale() === 'ar' ? 'ابدأ الآن' : 'Start Now' }}
                    </a>
                </div>
            </div>

            <!-- Course 2 -->
            <div class="sofia-card sofia-animate-fade-in-up sofia-animate-delay-1">
                <div class="relative mb-6">
                    <div class="w-full h-48 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-lg flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="absolute top-4 right-4 bg-emerald-500 text-white px-2 py-1 rounded-full text-sm font-semibold">
                        {{ app()->getLocale() === 'ar' ? 'شائع' : 'Popular' }}
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    {{ app()->getLocale() === 'ar' ? 'الفرنسية المتقدمة' : 'Advanced French' }}
                </h3>
                <p class="text-gray-600 mb-4">
                    {{ app()->getLocale() === 'ar' ? 'تطوير مهاراتك في اللغة الفرنسية إلى المستوى المتقدم' : 'Develop your French skills to an advanced level' }}
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-crimson-600">$49</span>
                    <a href="#" class="sofia-btn sofia-btn-primary">
                        {{ app()->getLocale() === 'ar' ? 'ابدأ الآن' : 'Start Now' }}
                    </a>
                </div>
            </div>

            <!-- Course 3 -->
            <div class="sofia-card sofia-animate-fade-in-up sofia-animate-delay-2">
                <div class="relative mb-6">
                    <div class="w-full h-48 bg-gradient-to-br from-violet-400 to-violet-600 rounded-lg flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <div class="absolute top-4 right-4 bg-violet-500 text-white px-2 py-1 rounded-full text-sm font-semibold">
                        {{ app()->getLocale() === 'ar' ? 'مميز' : 'Premium' }}
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    {{ app()->getLocale() === 'ar' ? 'العربية للأجانب' : 'Arabic for Foreigners' }}
                </h3>
                <p class="text-gray-600 mb-4">
                    {{ app()->getLocale() === 'ar' ? 'تعلم اللغة العربية بطريقة سهلة ومفهومة' : 'Learn Arabic in an easy and understandable way' }}
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-crimson-600">$39</span>
                    <a href="#" class="sofia-btn sofia-btn-primary">
                        {{ app()->getLocale() === 'ar' ? 'ابدأ الآن' : 'Start Now' }}
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="#courses" class="sofia-btn sofia-btn-secondary sofia-btn-lg">
                {{ app()->getLocale() === 'ar' ? 'عرض جميع الدورات' : 'View All Courses' }}
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="sofia-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="sofia-section-title">
                {{ app()->getLocale() === 'ar' ? 'ماذا يقول طلابنا' : 'What Our Students Say' }}
            </h2>
            <p class="sofia-section-subtitle">
                {{ app()->getLocale() === 'ar' ? 'اكتشف تجارب الطلاب الذين حققوا نجاحاً معنا' : 'Discover the experiences of students who have succeeded with us' }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="sofia-testimonial sofia-animate-fade-in-up">
                <p class="sofia-testimonial-text">
                    "{{ app()->getLocale() === 'ar' ? 'سوفيا ليرن غيرت طريقة تعلمي للغات تماماً. الطريقة التفاعلية والمناهج المصممة بعناية جعلت التعلم ممتعاً وفعالاً.' : 'SofiaLearn completely changed how I learn languages. The interactive approach and carefully designed curriculum made learning fun and effective.' }}"
                </p>
                <div class="sofia-testimonial-author">
                    <div class="sofia-testimonial-avatar">A</div>
                    <div>
                        <div class="sofia-testimonial-name">{{ app()->getLocale() === 'ar' ? 'أحمد محمد' : 'Ahmed Mohamed' }}</div>
                        <div class="sofia-testimonial-role">{{ app()->getLocale() === 'ar' ? 'طالب' : 'Student' }}</div>
                    </div>
                </div>
            </div>

            <div class="sofia-testimonial sofia-animate-fade-in-up sofia-animate-delay-1">
                <p class="sofia-testimonial-text">
                    "{{ app()->getLocale() === 'ar' ? 'أفضل منصة تعلم لغات استخدمتها على الإطلاق. التتبع التفصيلي للتقدم والدعم المستمر ساعداني في تحقيق أهدافي.' : 'The best language learning platform I have ever used. The detailed progress tracking and continuous support helped me achieve my goals.' }}"
                </p>
                <div class="sofia-testimonial-author">
                    <div class="sofia-testimonial-avatar">S</div>
                    <div>
                        <div class="sofia-testimonial-name">{{ app()->getLocale() === 'ar' ? 'سارة أحمد' : 'Sarah Ahmed' }}</div>
                        <div class="sofia-testimonial-role">{{ app()->getLocale() === 'ar' ? 'مهندسة' : 'Engineer' }}</div>
                    </div>
                </div>
            </div>

            <div class="sofia-testimonial sofia-animate-fade-in-up sofia-animate-delay-2">
                <p class="sofia-testimonial-text">
                    "{{ app()->getLocale() === 'ar' ? 'التجربة متعددة اللغات رائعة. يمكنني التعلم باللغة العربية والإنجليزية والفرنسية بسهولة تامة.' : 'The multilingual experience is amazing. I can learn in Arabic, English, and French with complete ease.' }}"
                </p>
                <div class="sofia-testimonial-author">
                    <div class="sofia-testimonial-avatar">M</div>
                    <div>
                        <div class="sofia-testimonial-name">{{ app()->getLocale() === 'ar' ? 'محمد علي' : 'Mohamed Ali' }}</div>
                        <div class="sofia-testimonial-role">{{ app()->getLocale() === 'ar' ? 'طبيب' : 'Doctor' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
@include('components.user.cta', [
    'title' => app()->getLocale() === 'ar' ? 'جاهز لبدء رحلتك التعليمية؟' : 'Ready to Start Your Learning Journey?',
    'subtitle' => app()->getLocale() === 'ar' ? 'انضم إلى آلاف الطلاب الذين يثقون في سوفيا ليرن لتعلم اللغات بطريقة فعالة وممتعة' : 'Join thousands of students who trust SofiaLearn for effective and enjoyable language learning',
    'primaryButton' => ['text' => app()->getLocale() === 'ar' ? 'ابدأ الآن مجاناً' : 'Start Free Now', 'url' => route('register')],
    'secondaryButton' => ['text' => app()->getLocale() === 'ar' ? 'تواصل معنا' : 'Contact Us', 'url' => '#contact']
])
@endsection

@push('scripts')
<script>
    // Additional landing page specific functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Parallax effect for hero section
        const hero = document.querySelector('.sofia-hero');
        if (hero) {
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                hero.style.transform = `translateY(${rate}px)`;
            });
        }

        // Course card interactions
        const courseCards = document.querySelectorAll('.sofia-card');
        courseCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Testimonial carousel (simple version)
        const testimonials = document.querySelectorAll('.sofia-testimonial');
        let currentTestimonial = 0;
        
        if (testimonials.length > 0) {
            setInterval(() => {
                testimonials.forEach((testimonial, index) => {
                    testimonial.style.opacity = index === currentTestimonial ? '1' : '0.7';
                });
                currentTestimonial = (currentTestimonial + 1) % testimonials.length;
            }, 5000);
        }
    });
</script>
@endpush


