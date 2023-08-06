<?php

namespace App\Http\Livewire\AdminPanel\Users;

use Livewire\Component;

class UserList extends Component
{
    public $users;

    public function render()
    {
        return view('livewire.admin-panel.users.user-list');
    }
}
