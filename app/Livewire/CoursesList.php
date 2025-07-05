<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CoursesList extends Component
{
    public $courses;

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function enroll($courseId)
    {
        if (!Auth::check()) {
            session()->flash('error', 'Please log in to enroll in a course.');
            return;
        }

        $user = Auth::user();
        $user->courses()->syncWithoutDetaching([$courseId]);

        session()->flash('success', 'You have successfully enrolled!');
    }

    public function render()
    {
        return view('livewire.courses-list');
    }
}
