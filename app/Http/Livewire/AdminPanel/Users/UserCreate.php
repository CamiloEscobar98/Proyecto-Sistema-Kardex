<?php

namespace App\Http\Livewire\AdminPanel\Users;

use App\Services\UserService;
use Livewire\Component;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserCreate extends Component
{
    public $name, $email;

    protected $rules = [
        'name' => ['required', 'string'],
        'email' => ['required', 'email', 'unique:users']
    ];

    public function render()
    {
        return view('livewire.admin-panel.users.user-create');
    }

    public function save()
    {
        $this->validate();

        /** @var UserService $userService */
        $userService = app(UserService::class);

        $data = $this->only(['name', 'email']);
        $data['password'] = 'password';
        $name = $data['name'];

        $title = __('messages.error');
        $text = __('models/user.messages.error-saved', compact('name'));
        $icon = 'error';

        try {
            DB::beginTransaction();
            $userService->create($data);
            DB::commit();

            $title = __('messages.success');
            $text = __('models/user.messages.saved', compact('name'));
            $icon = 'success';

            $this->reset(['name', 'email']);
        } catch (QueryException $qe) {
            DB::rollBack();
            Log::error("Livewire/Components/AdminPanel/Users/UserCreate/Save| QueryExceptionMessage: {$qe->getMessage()}");
        }

        $this->emit('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ]);
    }
}
