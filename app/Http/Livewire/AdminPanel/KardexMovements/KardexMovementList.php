<?php

namespace App\Http\Livewire\AdminPanel\KardexMovements;

use App\Services\KardexMovementService;
use Livewire\Component;

class KardexMovementList extends Component
{
    /** @var Collection */
    public $kardexMovements;

    protected $listeners = ['load', 'delete'];

    public function render()
    {
        return view('livewire.admin-panel.kardex-movements.kardex-movement-list');
    }

    public function load($params = [])
    {
        /** @var KardexMovementService $kardexMovementService */
        $kardexMovementService = app(KardexMovementService::class);
        $this->kardexMovements = $kardexMovementService->search($params, null, ['product'])->get();
    }
}
