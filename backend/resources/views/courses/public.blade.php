@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">All Courses</h1>
    
    @if($courses->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($courses as $course)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $course->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Teacher: {{ $course->teacher->name }}</p>
                            <p class="text-sm text-gray-500">Language: {{ strtoupper($course->language) }}</p>
                        </div>
                        
                        <a href="{{ route('courses.show', $course) }}" 
                           class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            View Course
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-8">
            {{ $courses->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">No courses available at the moment.</p>
        </div>
    @endif
</div>
@endsection
