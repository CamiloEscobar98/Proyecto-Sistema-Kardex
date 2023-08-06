<?php

namespace App\Http\Livewire\AdminPanel\Users;

use Livewire\Component;

class UserDelete extends Component
{
    public $modal;

    public function render()
    {
        return view('livewire.admin-panel.users.user-delete');
    }
}
