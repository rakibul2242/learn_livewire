<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name, $email, $phone, $role = 'student', $password;

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|digits_between:8,15',
        'role' => 'required|in:student,instructor',
        'password' => 'required|string|min:6',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
            'password' => Hash::make($this->password),
        ]);

        $this->reset(['name', 'email', 'phone', 'role', 'password']);

        session()->flash('success', 'Account created successfully. You can now login.');

        return redirect()->route('signin');
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
