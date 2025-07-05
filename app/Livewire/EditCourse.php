<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditCourse extends Component
{
    use WithFileUploads;

    public $course;
    public $title, $slug, $category, $description, $price, $image, $existingImage, $instructor_id;
    public $instructors = [];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->title = $course->title;
        $this->slug = $course->slug;
        $this->category = $course->category;
        $this->description = $course->description;
        $this->price = $course->price;
        $this->instructor_id = $course->instructor_id;
        $this->existingImage = $course->image;

        $this->instructors = User::where('role', 'instructor')->get();
    }

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|unique:courses,slug,' . $this->course->id,
            'category' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'instructor_id' => 'required|exists:users,id',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function update()
    {
        $this->validate();

        $imagePath = $this->existingImage;
        if ($this->image) {
            $imagePath = $this->image->store('courses', 'public');
        }

        $this->course->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => $this->category,
            'description' => $this->description,
            'price' => $this->price,
            'instructor_id' => $this->instructor_id,
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Course updated successfully.');

        return redirect()->route('courses');
    }

    public function render()
    {
        return view('livewire.edit-course');
    }
}
