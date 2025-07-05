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
        if (!session()->has('user_id')) {
            session()->flash('error', 'Please login as a student to enroll.');
            return;
        }

        if (session('user_role') !== 'student') {
            session()->flash('error', 'Only students can enroll in courses.');
            return;
        }

        $userId = session('user_id');

        $already = \DB::table('enrollments')->where('user_id', $userId)->where('course_id', $courseId)->exists();

        if ($already) {
            session()->flash('error', 'You are already enrolled in this course.');
            return;
        }

        \DB::table('enrollments')->insert([
            'user_id' => $userId,
            'course_id' => $courseId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flash('success', 'You have successfully enrolled!');
    }

    public function render()
    {
        return view('livewire.courses-list');
    }
}
