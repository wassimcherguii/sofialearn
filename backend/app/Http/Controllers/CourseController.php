<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('courses.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'language' => 'required|string|max:5',
            'teacher_id' => 'required|exists:users,id'
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {
        $course->load(['chapters.lessons', 'teacher']);
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('courses.edit', compact('course', 'teachers'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'language' => 'required|string|max:5',
            'teacher_id' => 'required|exists:users,id'
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully!');
    }
} 