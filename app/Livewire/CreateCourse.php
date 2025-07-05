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
    public $instructor_id = '';
    public $instructors = [];

    public function mount()
    {
        $this->instructors = User::Where('role', 'instructor')->get();
    }

    protected $rules = [
        'title' => 'required|string|max:255',
        'category' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'required|image|max:2048',
        'instructor_id' => 'required|exists:users,id',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('courses', 'public') : null;

        Course::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'slug' => Str::slug($this->slug),
            'category' => $this->category,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imagePath,
            'instructor_id' => $this->instructor_id,
        ]);

        session()->flash('success', 'Course added successfully.');
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.create-course');
    }
}
