<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UsersTable extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::where('is_admin', false)->get();
    }

    public function updateAccess($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->access = !$user->access;
            $user->save();
            $this->mount();
            $this->render();
        }
    }

    public function render()
    {
        return view('livewire.users-table', [
            'users' => $this->users,
        ]);
    }
}
