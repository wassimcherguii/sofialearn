@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <h1 class="text-3xl font-bold mb-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">Teacher Dashboard</h1>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-500 text-white p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">My Courses</h3>
            <p class="text-3xl font-bold {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ $courses->count() }}</p>
        </div>
        
        <div class="bg-green-500 text-white p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">Total Students</h3>
            <p class="text-3xl font-bold {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ $courses->sum('enrollments_count') }}</p>
        </div>
        
        <div class="bg-yellow-500 text-white p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">Active Courses</h3>
            <p class="text-3xl font-bold {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ $courses->count() }}</p>
        </div>
    </div>
    
    <div class="flex {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">My Courses</h2>
        <a href="{{ route('courses.create') }}" 
           class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Create New Course
        </a>
    </div>
    
    @if($courses->count() > 0)
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($courses as $course)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ $course->name }}</h3>
                    <p class="text-gray-600 mb-4 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ Str::limit($course->description, 100) }}</p>
                    
                    <div class="flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} justify-between mb-4">
                        <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                            <p class="text-sm text-gray-500">Students: {{ $course->enrollments->count() }}</p>
                            <p class="text-sm text-gray-500">Language: {{ strtoupper($course->language) }}</p>
                        </div>
                    </div>
                    
                    <div class="flex {{ app()->getLocale() === 'ar' ? 'flex-row-reverse space-x-reverse' : 'flex-row' }} space-x-2">
                        <a href="{{ route('courses.show', $course) }}" 
                           class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            View
                        </a>
                        <a href="{{ route('courses.edit', $course) }}" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            Edit
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg mb-4 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">You haven't created any courses yet.</p>
            <a href="{{ route('courses.create') }}" 
               class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create Your First Course
            </a>
        </div>
    @endif
</div>
@endsection
