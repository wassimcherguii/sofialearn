<footer class="sofia-footer">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Brand Section -->
            <div class="lg:col-span-1">
                <a href="{{ route('home') }}" class="sofia-footer-brand">
                    <div class="flex items-center space-x-2 rtl-reverse">
                        <div class="w-8 h-8 bg-crimson-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </div>
                        <span>SofiaLearn</span>
                    </div>
                </a>
                <p class="mt-4 text-sm text-gray-400 max-w-xs">
                    {{ app()->getLocale() === 'ar' ? 'اكتشف طريقة أنيقة لتعلم اللغات. دورات تفاعلية، تتبع التقدم، دردشة فورية، وتقييمات شاملة في تجربة متعددة اللغات.' : 'Discover an elegant way to learn languages. Interactive courses, progress tracking, real-time chat, and comprehensive assessments in a refined multilingual experience.' }}
                </p>
                <div class="mt-6 flex space-x-4 rtl-reverse">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="sofia-footer-title">{{ app()->getLocale() === 'ar' ? 'روابط سريعة' : 'Quick Links' }}</h3>
                <ul class="space-y-3">
                    <li><a href="#features" class="sofia-footer-link">{{ app()->getLocale() === 'ar' ? 'المميزات' : 'Features' }}</a></li>
                    <li><a href="#courses" class="sofia-footer-link">{{ app()->getLocale() === 'ar' ? 'الدورات' : 'Courses' }}</a></li>
                    <li><a href="#pricing" class="sofia-footer-link">{{ app()->getLocale() === 'ar' ? 'الأسعار' : 'Pricing' }}</a></li>
                    <li><a href="#about" class="sofia-footer-link">{{ app()->getLocale() === 'ar' ? 'حولنا' : 'About Us' }}</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="sofia-footer-title">{{ app()->getLocale() === 'ar' ? 'الدعم' : 'Support' }}</h3>
                <ul class="space-y-3">
                    <li><a href="#help" class="sofia-footer-link">{{ app()->getLocale() === 'ar' ? 'مركز المساعدة' : 'Help Center' }}</a></li>
                    <li><a href="#contact" class="sofia-footer-link">{{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact Us' }}</a></li>
                    <li><a href="#privacy" class="sofia-footer-link">{{ app()->getLocale() === 'ar' ? 'سياسة الخصوصية' : 'Privacy Policy' }}</a></li>
                    <li><a href="#terms" class="sofia-footer-link">{{ app()->getLocale() === 'ar' ? 'شروط الخدمة' : 'Terms of Service' }}</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="sofia-footer-title">{{ app()->getLocale() === 'ar' ? 'النشرة الإخبارية' : 'Newsletter' }}</h3>
                <p class="text-sm text-gray-400 mb-4">
                    {{ app()->getLocale() === 'ar' ? 'اشترك للحصول على آخر الأخبار والتحديثات' : 'Subscribe to get the latest news and updates' }}
                </p>
                <form class="flex space-x-2 rtl-reverse">
                    <input type="email" placeholder="{{ app()->getLocale() === 'ar' ? 'بريدك الإلكتروني' : 'Your email' }}" class="flex-1 px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-crimson-500 focus:border-transparent">
                    <button type="submit" class="sofia-btn sofia-btn-primary">
                        {{ app()->getLocale() === 'ar' ? 'اشترك' : 'Subscribe' }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="mt-8 pt-8 border-t border-gray-800">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-400">
                    &copy; {{ date('Y') }} SofiaLearn. {{ app()->getLocale() === 'ar' ? 'جميع الحقوق محفوظة.' : 'All rights reserved.' }}
                </p>
                <div class="mt-4 md:mt-0 flex space-x-6 rtl-reverse">
                    <a href="#privacy" class="text-sm text-gray-400 hover:text-white">{{ app()->getLocale() === 'ar' ? 'الخصوصية' : 'Privacy' }}</a>
                    <a href="#terms" class="text-sm text-gray-400 hover:text-white">{{ app()->getLocale() === 'ar' ? 'الشروط' : 'Terms' }}</a>
                    <a href="#cookies" class="text-sm text-gray-400 hover:text-white">{{ app()->getLocale() === 'ar' ? 'ملفات تعريف الارتباط' : 'Cookies' }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>


