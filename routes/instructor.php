<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\InstructorCourses;

Route::redirect('/', 'instructor/courses');

Route::get('courses', InstructorCourses::class)->middleware('can:courses:view')->name('courses.index');
