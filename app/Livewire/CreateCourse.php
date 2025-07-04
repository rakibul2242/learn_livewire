<?php
 
namespace App\Livewire;
 
use Livewire\Attributes\Validate; 
use Livewire\Component;
use App\Models\Course;
 
class CreateCourse extends Component
{
    public $title = '';
    public $slug = '';
    public $category = '';
    public $description = '';
    public $price = '';
    public $image = '';
    public $instructor_name = '';
    public $instructor_id = '';
 
    public function save()
    {
        $this->validate(); 
 
        Course::create(
            $this->only(['title', 'content'])
        );
 
        return $this->redirect('/posts');
    }

    public function render()
    {
        return view('livewire.create-course');
    }
}
