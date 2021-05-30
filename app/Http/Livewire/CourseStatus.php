<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CourseStatus extends Component
{
    use AuthorizesRequests;

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

        if (!$this->current) {
            $this->current = $course->lessons->last();
        }

        $this->authorize('enrolled', $course);
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    // Methods

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
    }

    public function completed()
    {
        if ($this->current->completed) {
            // Delete register
            $this->current->users()->detach(auth()->id());
        } else {
            // Add register
            $this->current->users()->attach(auth()->id());
        }

        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    // Computed properties

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

    public function getAdvanceProperty()
    {
        $i = 0;
        $lessons = $this->course->lessons;

        foreach ($lessons as $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }

        $advance = ($i * 100) / ($lessons->count());

        return round($advance, 2);
    }
}
