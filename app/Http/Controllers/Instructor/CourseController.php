<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Level;
use App\Models\Price;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:courses:view')->only('index');
        $this->middleware('can:courses:create')->only('create', 'store');
        $this->middleware('can:courses:update')->only('edit', 'update', 'goals');
        $this->middleware('can:courses:destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->prepend('Seleccione una categoría', '');
        $levels = Level::pluck('name', 'id')->prepend('Seleccione un nivel', '');
        $prices = Price::pluck('name', 'id')->prepend('Seleccione un precio', '');

        return view('instructor.courses.create', compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'user_id' => 'required',
            'file' => 'image'
        ], [
            'category_id.required' => 'Debes seleccionar una categoría',
            'level_id.required' => 'Debes seleccionar un nivel',
            'price_id.required' => 'Debes seleccionar un precio',
        ]);

        $course = Course::create($validated);

        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file'));

            $course->image()->create(compact('url'));
        }


        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('dictated', $course);

        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('dictated', $course);

        $validated = $request->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('courses')->ignore($course)],
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'user_id' => 'required',
            'file' => 'image'
        ], [
            'category_id.required' => 'Debes seleccionar una categoría',
            'level_id.required' => 'Debes seleccionar un nivel',
            'price_id.required' => 'Debes seleccionar un precio',
        ]);

        $course->update($validated);

        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file'));

            if ($course->image) {
                Storage::delete($course->image->url);
                $course->image->update(compact('url'));
            } else {
                $course->image()->create(compact('url'));
            }
        }

        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function goals(Course $course)
    {
        $this->authorize('dictated', $course);

        return view('instructor.courses.goals', compact('course'));
    }

    public function status(Course $course)
    {
        $course->status = Course::REVISION;
        $course->save();

        $course->observation?->delete();

        return redirect()->route('instructor.courses.edit', $course);
    }

    public function observation(Course $course)
    {
        return view('instructor.courses.observation', compact('course'));
    }
}
