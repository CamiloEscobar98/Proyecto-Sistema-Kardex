<?php

namespace App\Http\Livewire\AdminPanel\Users;

use Livewire\Component;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Services\UserService;

class UserDelete extends Component
{
    public $modal;

    public $user;

    public function render()
    {
        return view('livewire.admin-panel.users.user-delete');
    }

    public function delete()
    {
        /** @var UserService $userService */
        $userService = app(UserService::class);

        $userAux = $this->user;
        $id = $userAux->id;
        $name = $userAux->name;

        $title = __('messages.error');
        $text = __('models/user.messages.error-deleted', compact('name'));
        $icon = 'error';

        try {
            DB::beginTransaction();
            $userService->delete($this->user->id);
            DB::commit();

            $this->emitTo('admin-panel.users.user-list', 'delete', $id);

            $title = __('messages.success');
            $text = __('models/user.messages.deleted', compact('name'));
            $icon = 'success';

            $this->reset('modal');
        } catch (QueryException $qe) {
            DB::rollBack();
            Log::error("Livewire/Components/AdminPanel/Users/UserDelete/Delete| QueryExceptionMessage: {$qe->getMessage()}");
        }

        $this->emit('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ]);
    }
}
