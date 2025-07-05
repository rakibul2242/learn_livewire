<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class EnrolledStudents extends Component
{
    public $course;
    public $students = [];

    public function mount($slug)
    {
        $this->course = Course::where('slug', $slug)->with('students')->firstOrFail();
        $this->students = $this->course->students;
    }
public function removeStudent($studentId)
{
    $this->course->students()->detach($studentId);
    $this->students = $this->course->students()->get();
    session()->flash('success', 'Student removed successfully.');
}

    public function render()
    {
        return view('livewire.enrolled-students');
    }
}
