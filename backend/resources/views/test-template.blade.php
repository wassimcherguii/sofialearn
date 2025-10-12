<!DOCTYPE html>
<html lang="en" dir="ltr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Template - SofiaLearn</title>
    <meta name="description" content="Test page using centralized SofiaLearn template">
    
    @vite(['resources/css/app.css', 'resources/css/user.css', 'resources/js/app.js', 'resources/js/user.js'])
</head>
<body class="h-full bg-white">
    <!-- Simple Header -->
    <nav class="bg-white shadow-sm border-b border-gray-100 px-4 py-3">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-crimson-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                </div>
                <span class="text-lg font-bold text-gray-800">SofiaLearn Test</span>
            </div>
            <div>
                <a href="/" class="text-gray-600 hover:text-crimson-600">Home</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        <!-- Hero Section -->
        <section class="sofia-hero">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="sofia-hero-title">
                        Test Page with <span class="sofia-text-gradient">Centralized Template</span>
                    </h1>
                    <p class="sofia-hero-subtitle">
                        This page uses the SofiaLearn centralized template system without any middleware dependencies.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
                        <a href="/" class="sofia-btn sofia-btn-primary sofia-btn-lg">Go Home</a>
                        <a href="/test-landing" class="sofia-btn sofia-btn-secondary sofia-btn-lg">Test Route</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="sofia-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="sofia-section-title">Template Components Working</h2>
                    <p class="sofia-section-subtitle">All centralized template components are functioning correctly</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="sofia-card sofia-card-feature">
                        <div class="sofia-card-feature-icon">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h3 class="sofia-card-feature-title">CSS Working</h3>
                        <p class="sofia-card-feature-description">Centralized CSS theme is loading correctly</p>
                    </div>

                    <div class="sofia-card sofia-card-feature">
                        <div class="sofia-card-feature-icon">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="sofia-card-feature-title">Components Working</h3>
                        <p class="sofia-card-feature-description">Reusable components are functioning properly</p>
                    </div>

                    <div class="sofia-card sofia-card-feature">
                        <div class="sofia-card-feature-icon">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="sofia-card-feature-title">JavaScript Working</h3>
                        <p class="sofia-card-feature-description">Interactive features are enabled</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Simple Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2024 SofiaLearn Test Page. All systems working correctly!</p>
        </div>
    </footer>
</body>
</html>


