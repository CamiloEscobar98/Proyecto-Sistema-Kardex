<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Services\KardexMovementService;
use Illuminate\Http\Request;

class KardexMovementController extends Controller
{
    /** @var KardexMovementService */
    protected $kardexMovementService;

    public function __construct(KardexMovementService $kardexMovementService)
    {
        $this->kardexMovementService = $kardexMovementService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kardexMovements = $this->kardexMovementService->search()->get();
        return view('pages.admin_panel.kardex_movements.index', compact('kardexMovements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin_panel.kardex_movements.create');
    }
}
