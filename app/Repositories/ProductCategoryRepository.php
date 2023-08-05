<?php

namespace App\Repositories;

use App\Models\ProductCategory;

class ProductCategoryRepository extends AbstractRepository
{
    public function __construct(ProductCategory $model)
    {
        $this->model = $model;
    }
}
