<?php

namespace App\Http\Livewire\AdminPanel\Users;

use Livewire\Component;

use Illuminate\Database\Eloquent\Collection;

use App\Services\UserService;

class UserList extends Component
{
    /** @var Collection */
    public $users;

    protected $listeners = ['load', 'delete'];

    public function render()
    {
        return view('livewire.admin-panel.users.user-list');
    }

    public function load($params = [])
    {
        $params['except'] = currentUser()->id;
        /** @var UserService $userService */
        $userService = app(UserService::class);
        $this->users = $userService->search($params)->get();
    }

    public function delete($id)
    {
        $this->users = $this->users->forget($id);
    }
}
