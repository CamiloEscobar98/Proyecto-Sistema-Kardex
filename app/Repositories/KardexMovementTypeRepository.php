<?php

namespace App\Repositories;

use App\Models\KardexMovementType;

class KardexMovementTypeRepository extends AbstractRepository
{
    public function __construct(KardexMovementType $model)
    {
        $this->model = $model;
    }
}
