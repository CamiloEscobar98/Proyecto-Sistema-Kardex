<?php

namespace App\Services;

use App\Repositories\KardexMovementRepository;

class KardexMovementService extends AbstractModelService
{
    /** @var KardexMovementRepository */
    protected $kardexMovementRepository;

    public function __construct(KardexMovementRepository $kardexMovementRepository)
    {
        $this->kardexMovementRepository = $kardexMovementRepository;
    }
}
