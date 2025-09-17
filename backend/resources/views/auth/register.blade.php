@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Create your account
            </h2>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <input name="name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-crimson-500 focus:border-crimson-500 focus:z-10 sm:text-sm" placeholder="Full name">
                </div>
                <div>
                    <input name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-crimson-500 focus:border-crimson-500 focus:z-10 sm:text-sm" placeholder="Email address">
                </div>
                <div>
                    <input name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-crimson-500 focus:border-crimson-500 focus:z-10 sm:text-sm" placeholder="Password">
                </div>
                <div>
                    <input name="password_confirmation" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-crimson-500 focus:border-crimson-500 focus:z-10 sm:text-sm" placeholder="Confirm password">
                </div>
                <div>
                    <select name="role" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-crimson-500 focus:border-crimson-500 focus:z-10 sm:text-sm">
                        <option value="">Select your role</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="admin">Administrator</option>
                    </select>
                </div>
            </div>

            @if ($errors->any())
                <div class="text-red-600 text-sm">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-crimson-600 hover:bg-crimson-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-crimson-500">
                    Create Account
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-crimson-600 hover:text-crimson-500">
                    Already have an account? Sign in here
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 