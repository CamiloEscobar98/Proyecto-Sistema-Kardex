<?php

namespace App\Http\Livewire\AdminPanel\Users;

use Livewire\Component;

class UserFilter extends Component
{
    public $name, $email;

    public function render()
    {
        return view('livewire.admin-panel.users.user-filter');
    }

    public function search()
    {
        $params = array_filter($this->only(['name', 'email']));
        $this->emitTo('admin-panel.users.user-list', 'load', $params);
    }
}
