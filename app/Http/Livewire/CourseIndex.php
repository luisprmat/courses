<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseIndex extends Component
{
    public function render()
    {
        $courses = Course::where('status', Course::PUBLISHED)
            ->latest('id')
            ->paginate(8);

        return view('livewire.course-index', compact('courses'));
    }
}
