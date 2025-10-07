@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Admin Panel</h1>
    <div class="mb-8">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                Logout
            </button>
        </form>
    </div>
    
    <div class="text-center py-12">
        <p class="text-gray-500 text-lg mb-4">This page is under construction.</p>
        <p class="text-gray-500">Please use the main dashboard for admin functions.</p>
    </div>
</div>
@endsection
