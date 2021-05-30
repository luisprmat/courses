<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        $this->authorize('published', $course);

        $similars = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('status', Course::PUBLISHED)
            ->latest('id')
            ->take(5)
            ->get();

        return view('courses.show', compact('course', 'similars'));
    }

    public function enrolled(Course $course)
    {
        $course->students()->attach(auth()->id());

        return redirect()->route('courses.status', $course);
    }
}
