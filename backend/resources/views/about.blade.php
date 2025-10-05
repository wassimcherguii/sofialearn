@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">About SofiaLearn</h1>
    
    <div class="prose max-w-none">
        <p class="text-lg mb-4">
            SofiaLearn is a comprehensive learning management system designed to provide 
            an excellent educational experience for students, teachers, and administrators.
        </p>
        
        <h2 class="text-2xl font-semibold mb-4">Our Mission</h2>
        <p class="mb-4">
            To make quality education accessible to everyone through innovative technology 
            and engaging learning experiences.
        </p>
        
        <h2 class="text-2xl font-semibold mb-4">Features</h2>
        <ul class="list-disc pl-6 mb-4">
            <li>Interactive courses with multimedia content</li>
            <li>Progress tracking and analytics</li>
            <li>Quiz and homework management</li>
            <li>Multi-language support</li>
            <li>Role-based access control</li>
        </ul>
    </div>
</div>
@endsection
