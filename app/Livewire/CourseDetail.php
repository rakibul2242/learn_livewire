<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CourseDetail extends Component
{
    use WithPagination;

    public Course $course;
    public $typeFilter = '';

    protected $queryString = ['typeFilter'];

    public function mount(Course $course)
    {
        $this->course = $course->load('instructor');
    }

    public function updatedTypeFilter()
    {
        $this->resetPage();
    }

    public function getContentsProperty()
    {
        return $this->course->contents()
            ->when($this->typeFilter, function ($query) {
                $query->where('type', $this->typeFilter);
            })
            ->latest()
            ->paginate(9);
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        session()->flash('success', 'Course deleted successfully.');
        return redirect()->route('courses');
    }

    public function render()
    {
        return view('livewire.course-detail', [
            'course' => $this->course,
            'contents' => $this->contents,
        ]);
    }
}
