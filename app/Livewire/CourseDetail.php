<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CourseDetail extends Component
{
    use WithPagination;

    public Course $course;

    protected $paginationTheme = 'tailwind'; // Optional: use Tailwind styling for pagination links

    public function mount(Course $course)
    {
        $this->course = $course->load('instructor');
    }

    public function render()
    {
        $videos = $this->course
            ->videos()
            ->orderBy('id') // or by title, etc.
            ->paginate(6);

        return view('livewire.course-detail', [
            'videos' => $videos,
        ]);
    }
}
