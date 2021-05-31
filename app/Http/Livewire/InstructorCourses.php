<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class InstructorCourses extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $courses = Course::where('user_id', auth()->id())
            ->where('title', 'LIKE', "%{$this->search}%")
            ->paginate(8);

        return view('livewire.instructor-courses', compact('courses'));
    }
}
