<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonResources extends Component
{
    use WithFileUploads;

    public $lesson, $file;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.instructor.lesson-resources');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required'
        ]);

        $url = $this->file->store('resources');

        $this->lesson->resource()->create(compact('url'));

        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function destroy()
    {
        Storage::delete($this->lesson->resource->url);
        $this->lesson->resource->delete();
        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function download()
    {
        return response()->download(storage_path('app/public/' . $this->lesson->resource->url));
    }
}