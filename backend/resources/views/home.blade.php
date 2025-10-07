@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-crimson-50 to-orange-50 min-h-screen">
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 py-20">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-gray-900 mb-6">
                Learn Languages with
                <span class="text-crimson-600">Sofia Learning</span>
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Discover an elegant way to learn languages. Interactive courses, progress tracking, 
                real-time chat, and comprehensive assessments in a refined multilingual experience.
            </p>
            <!-- Flowbite Alert Test -->
            <div id="flowbite-alert" class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Flowbite is working!</span> This is a Flowbite alert component to test the installation.
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#flowbite-alert" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>

            <div class="flex justify-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-crimson-600 text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-crimson-700">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="bg-crimson-600 text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-crimson-700">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}" class="border-2 border-crimson-600 text-crimson-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-crimson-50">
                        Sign In
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-crimson-600 mb-2">{{ $stats['total_courses'] }}</div>
                <div class="text-gray-600">Available Courses</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-crimson-600 mb-2">{{ $stats['total_students'] }}</div>
                <div class="text-gray-600">Active Students</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-crimson-600 mb-2">{{ $stats['total_teachers'] }}</div>
                <div class="text-gray-600">Expert Teachers</div>
            </div>
        </div>
    </div>

    <!-- Featured Courses -->
    @if($featuredCourses->count() > 0)
    <div class="max-w-7xl mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Featured Courses</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredCourses as $course)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $course->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">By {{ $course->teacher->name }}</span>
                        <span class="bg-crimson-100 text-crimson-800 px-3 py-1 rounded-full text-sm">
                            {{ strtoupper($course->language) }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Why Choose Sofia Learning?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-crimson-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crimson-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Interactive Courses</h3>
                <p class="text-gray-600">Learn with engaging content and real-time feedback</p>
            </div>
            
            <div class="text-center">
                <div class="bg-crimson-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crimson-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Progress Tracking</h3>
                <p class="text-gray-600">Monitor your learning journey with detailed analytics</p>
            </div>
            
            <div class="text-center">
                <div class="bg-crimson-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crimson-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Real-time Chat</h3>
                <p class="text-gray-600">Connect with teachers and fellow students instantly</p>
            </div>
        </div>
    </div>
</div>
@endsection 