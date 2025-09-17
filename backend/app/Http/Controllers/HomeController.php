<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::with('teacher')
            ->latest()
            ->take(6)
            ->get();
            
        $stats = [
            'total_courses' => Course::count(),
            'total_students' => User::where('role', 'student')->count(),
            'total_teachers' => User::where('role', 'teacher')->count()
        ];

        return view('home', compact('featuredCourses', 'stats'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function courses()
    {
        $courses = Course::with('teacher')
            ->latest()
            ->paginate(12);

        return view('courses.public', compact('courses'));
    }
} 