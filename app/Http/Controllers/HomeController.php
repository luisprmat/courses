<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::where('status', Course::PUBLISHED)
            ->latest('id')
            ->get();

        return view('welcome', compact('courses'));
    }
}
