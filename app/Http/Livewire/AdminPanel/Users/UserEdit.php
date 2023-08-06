<?php

namespace App\Http\Livewire\AdminPanel\Users;

use Livewire\Component;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use App\Services\UserService;

class UserEdit extends Component
{
    public User $user;

    public $userId, $name, $email;

    protected function rules()
    {
        return [
            'name' => ['required'],
            'email' => [
                'required', 'email', 'unique:users,email,' . $this->userId
            ],
        ];
    }

    public function mount()
    {
        $this->userId = $this->user->id;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.admin-panel.users.user-edit');
    }

    public function update()
    {
        $this->validate();

        /** @var UserService $userService */
        $userService = app(UserService::class);

        $data = $this->only(['name', 'email']);
        $name = $data['name'];

        $title = __('messages.error');
        $text = __('models/user.messages.error-updated', compact('name'));
        $icon = 'error';

        try {
            DB::beginTransaction();
            $userService->update($this->userId, $data);
            DB::commit();

            $title = __('messages.success');
            $text = __('models/user.messages.updated', compact('name'));
            $icon = 'success';
        } catch (QueryException $qe) {
            DB::rollBack();
            Log::error("Livewire/Components/User/UserEdit/Edit| QueryExceptionMessage: {$qe->getMessage()}");
        }

        $this->emit('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ]);
    }
}
