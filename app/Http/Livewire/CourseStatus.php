<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class CourseStatus extends Component
{
    public $course, $current;

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

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
    }

    public function getIndexProperty()
    {
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty()
    {
        return $this->index ? $this->course->lessons[$this->index - 1] : null;
    }

    public function getNextProperty()
    {
        return $this->index != $this->course->lessons->count() - 1 ? $this->next = $this->course->lessons[$this->index + 1] : null;
    }
}
