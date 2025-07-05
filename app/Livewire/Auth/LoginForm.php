<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class LoginForm extends Component
{
    public $email,
        $password,
        $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ];
    public function updated($property)
    {
        $this->validateOnly($property);
    }
    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();
        if (!$user || !Hash::check($this->password, $user->password)) {
            session()->flash('error', 'Invalid email or password.');
            return;
        }

        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_role' => $user->role,
        ]);

 session()->flash('success', 'Congratulation, Login successfully.'); 

        if ($user->role === 'student') {
            // return redirect()->route('student.dashboard');
            return redirect()->route('home');
        } elseif ($user->role === 'instructor') {
            // return redirect()->route('instructor.dashboard');
            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
