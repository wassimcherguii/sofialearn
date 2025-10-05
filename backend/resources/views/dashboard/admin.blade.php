@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-blue-500 text-white p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Total Users</h3>
            <p class="text-3xl font-bold">{{ $stats['total_users'] }}</p>
        </div>
        
        <div class="bg-green-500 text-white p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Total Courses</h3>
            <p class="text-3xl font-bold">{{ $stats['total_courses'] }}</p>
        </div>
        
        <div class="bg-yellow-500 text-white p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Total Enrollments</h3>
            <p class="text-3xl font-bold">{{ $stats['total_enrollments'] }}</p>
        </div>
        
        <div class="bg-purple-500 text-white p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Active Users</h3>
            <p class="text-3xl font-bold">{{ $stats['total_users'] }}</p>
        </div>
    </div>
    
    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-4">Quick Actions</h2>
            <div class="space-y-3">
                <a href="{{ route('courses.index') }}" 
                   class="block bg-blue-500 text-white px-4 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 text-center">
                    Manage Courses
                </a>
                <a href="#" 
                   class="block bg-green-500 text-white px-4 py-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 text-center">
                    Manage Users
                </a>
                <a href="#" 
                   class="block bg-yellow-500 text-white px-4 py-3 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-center">
                    System Settings
                </a>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-4">Recent Activity</h2>
            <div class="space-y-3">
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    <p class="text-sm">System is running normally</p>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                    <p class="text-sm">All services operational</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
