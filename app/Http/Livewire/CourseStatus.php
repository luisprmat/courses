<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseStatus extends Component
{
    public $course;
    public $current;

    public function mount(Course $course)
    {
        $this->course = $course;

        foreach ($course->lessons as $lesson) {
            if (! $lesson->completed) {
                $this->current = $lesson;
                break;
            }
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }
}
