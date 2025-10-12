<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;

// All routes use locale middleware so pages default to FR and honor session
Route::middleware('setlocale')->group(function () {
    // Public routes
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/courses', [HomeController::class, 'courses'])->name('courses.public');

    // Authentication routes
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // Language switcher - saves to session and redirects back
    Route::post('/locale', function () {
        $locale = request('locale');
        if (in_array($locale, ['fr', 'en', 'ar'], true)) {
            session(['locale' => $locale]);
        }
        return back();
    })->name('locale.switch');

    // Protected routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        
        // Course management (admin/teacher only)
        Route::middleware('role:admin,teacher')->group(function () {
            Route::resource('courses', CourseController::class);
        });
        
        // Student routes
        Route::middleware('role:student')->group(function () {
            Route::get('/my-courses', function () {
                return view('student.my-courses');
            })->name('student.courses');
        });
    });

    // Admin login route (public)
    Route::get('/admin/login', function () {
        return view('admin.login');
    })->name('admin.login');

    // Admin dashboard with redirect logic
    Route::get('/admin', function () {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }
        
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied. Admin privileges required.');
        }
        
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin dashboard2 with enhanced RTL support
    Route::get('/admin/dashboard2', function () {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }
        
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied. Admin privileges required.');
        }
        
        $stats = [
            'total_users' => \App\Models\User::count(),
            'total_courses' => \App\Models\Course::count(),
            'total_enrollments' => \App\Models\Enrollment::count(),
            'active_users' => \App\Models\User::where('role', 'student')->count()
        ];
        
        return view('dashboard.admin2', compact('stats'));
    })->name('admin.dashboard2');

    // Admin dashboard3 with clean test structure
    Route::get('/admin/dashboard3', function () {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }
        
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied. Admin privileges required.');
        }
        
        return view('dashboard.admin3');
    })->name('admin.dashboard3');

    // Admin dashboard4 - Arabic only with RTL
    Route::get('/admin/dashboard4', function () {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }
        
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied. Admin privileges required.');
        }
        
        return view('dashboard.admin4');
    })->name('admin.dashboard4');

    // Admin dashboard5 - Centralized theme system
    Route::get('/admin/dashboard5', function () {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }
        
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied. Admin privileges required.');
        }
        
        return view('dashboard.admin5');
    })->name('admin.dashboard5');

    // Landing page with centralized user theme
    Route::get('/landing', function () {
        return view('landing');
    })->name('landing');
});

// Test routes (completely outside any middleware)
Route::get('/test-landing', function () {
    return 'Landing page test - routing works!';
});

Route::get('/test-view', function () {
    return view('test-landing');
});

// Test route with centralized template (no middleware)
Route::get('/test-template', function () {
    return view('test-template');
});
