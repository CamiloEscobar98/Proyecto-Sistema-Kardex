<?php

namespace App\Repositories;

use App\Models\KardexMovement;

class KardexMovementRepository extends AbstractRepository
{
    public function __construct(KardexMovement $model)
    {
        $this->model = $model;
    }
}
