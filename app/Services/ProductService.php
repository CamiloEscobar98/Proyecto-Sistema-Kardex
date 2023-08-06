<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService extends AbstractModelService
{
    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    /** 
     * Search By Keywords 
     * 
     * @param array $select
     * @param array $params
     * @param array $with
     * @param array $withCount
     * @return Builder
     */
    public function search(array $params = [], array $select = null, array $with = [], array $withCount = [])
    {
        /** @var Builder $query */
        return $this->repository->getModel()
            ->select($this->getSelectOrDefault())
            ->when($params['id'] ?? null, function ($query, $value) {
                return $query->byId($value);
            })
            ->when($params['product_category_id'] ?? null, function ($query, $value) {
                return $query->byProductCategoryId($value);
            })
            ->when($params['name'] ?? null, function ($query, $value) {
                return $query->byName($value);
            })
            ->with($with)
            ->withCount($withCount);
    }
}
