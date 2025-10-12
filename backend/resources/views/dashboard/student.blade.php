@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <h1 class="text-3xl font-bold mb-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">Student Dashboard</h1>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-500 text-white p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">My Courses</h3>
            <p class="text-3xl font-bold {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ $enrollments->count() }}</p>
        </div>
        
        <div class="bg-green-500 text-white p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">Completed</h3>
            <p class="text-3xl font-bold {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">0</p>
        </div>
        
        <div class="bg-yellow-500 text-white p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">In Progress</h3>
            <p class="text-3xl font-bold {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ $enrollments->count() }}</p>
        </div>
    </div>
    
    <h2 class="text-2xl font-semibold mb-4 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">My Enrolled Courses</h2>
    
    @if($enrollments->count() > 0)
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($enrollments as $enrollment)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ $enrollment->course->name }}</h3>
                    <p class="text-gray-600 mb-4 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">{{ Str::limit($enrollment->course->description, 100) }}</p>
                    
                    <div class="flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'flex-row' }} justify-between">
                        <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                            <p class="text-sm text-gray-500">Teacher: {{ $enrollment->course->teacher->name }}</p>
                            <p class="text-sm text-gray-500">Enrolled: {{ $enrollment->enrolled_at->format('M d, Y') }}</p>
                        </div>
                        
                        <a href="{{ route('courses.show', $enrollment->course) }}" 
                           class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Continue Learning
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg mb-4 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">You haven't enrolled in any courses yet.</p>
            <a href="{{ route('courses.public') }}" 
               class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Browse Courses
            </a>
        </div>
    @endif
</div>
@endsection
