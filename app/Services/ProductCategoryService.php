<?php

namespace App\Services;

use App\Repositories\ProductCategoryRepository;

class ProductCategoryService extends AbstractModelService
{
    /** @var ProductCategoryRepository */
    protected $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->repository = $productCategoryRepository;
    }
}
