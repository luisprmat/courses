<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', Course::REVISION)->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course)
    {
        $this->authorize('revision', $course);

        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('info', 'No se puede publicar un curso que no esté completo');
        }

        $course->status = Course::PUBLISHED;
        $course->save();

        $mail = new ApprovedCourse($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('info', 'El curso se publicó con éxito');
    }
}
