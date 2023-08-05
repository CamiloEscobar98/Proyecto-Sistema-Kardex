<?php

namespace App\Services;

use App\Repositories\KardexMovementTypeRepository;

class KardexMovementTypeService extends AbstractModelService
{
    /** @var KardexMovementTypeRepository */
    protected $kardexMovementTypeRepository;

    public function __construct(KardexMovementTypeRepository $kardexMovementTypeRepository)
    {
        $this->kardexMovementTypeRepository = $kardexMovementTypeRepository;
    }
}
