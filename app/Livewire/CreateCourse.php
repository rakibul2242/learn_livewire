<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateCourse extends Component
{
    use WithFileUploads;

    public $title = '';
    public $slug = '';
    public $category = '';
    public $description = '';
    public $price = '';
    public $image = '';
    public $instructor_name = '';
    public $instructor_id = '';
    public $instructors = '';

    public function mount()
    {
        $this->instructors = User::all();
    }

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|unique:courses,slug',
        'category' => 'nullable|string',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048',
        'instructor_name' => 'nullable|string|max:255',
        'instructor_id' => 'nullable|exists:users,id',
    ];

    public function save()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('courses', 'public') : null;

        Course::create([
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
            'category' => $this->category,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imagePath,
            'instructor_name' => $this->instructor_name,
            'instructor_id' => $this->instructor_id,
        ]);

        session()->flash('success', 'Course added successfully.');
        return redirect()->route('');
    }

    public function render()
    {
        return view('livewire.create-course');
    }
}
