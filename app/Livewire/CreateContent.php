<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Content;
use Livewire\WithFileUploads;

class CreateContent extends Component
{
    use WithFileUploads;

    public $course;
    public $type = null;
    public $confirmedType = null;

    public $title;
    public $content_text;
    public $videoFile;
    public $duration;
    public $quiz_json;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function confirmType()
    {
        $this->validate([
            'type' => 'required|in:text,video,quiz',
        ]);

        $this->confirmedType = $this->type;
    }

    public function save()
    {
        $rules = [
            'title' => 'required|string|max:255',
        ];

        if ($this->confirmedType === 'text') {
            $rules['content_text'] = 'required|string';
        } elseif ($this->confirmedType === 'video') {
            $rules['videoFile'] = 'required|file|mimes:mp4|max:10240';
            $rules['duration'] = 'required|integer|min:1';
        } elseif ($this->confirmedType === 'quiz') {
            $rules['quiz_json'] = 'required|json';
        }

        $this->validate($rules);

        $videoPath = null;
        if ($this->confirmedType === 'video') {
            $videoPath = $this->videoFile->store('videos', 'public');
        }

        Content::create([
            'course_id' => $this->course->id,
            'type' => $this->confirmedType,
            'title' => $this->title,
            'content_text' => $this->content_text,
            'video_url' => $videoPath,
            'duration' => $this->duration,
            'quiz_data' => $this->quiz_json,
        ]);

        session()->flash('message', 'Content added successfully!');

        // Do not reset `confirmedType` or `type`
        $this->reset(['title', 'content_text', 'videoFile', 'duration', 'quiz_json']);
    }

    public function render()
    {
        return view('livewire.create-content');
    }
}
