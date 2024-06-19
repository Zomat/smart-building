<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $message;

    public function render()
    {
        return view('livewire.user-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'token' => Str::random(10)
        ]);

        $this->message = "User created successfully! Token: " . $user->token;
        $this->reset(['name', 'email', 'password']);
    }
}
