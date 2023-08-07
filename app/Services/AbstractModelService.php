<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use App\Repositories\AbstractRepository;

abstract class AbstractModelService
{
    /** @var AbstractRepository */
    protected $repository;

    public function __construct(AbstractRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $params): void
    {
        $this->repository->create($params);
    }

    public function update($id, array $params)
    {
        return $this->repository->update($id, $params);
    }

    public function delete($id): void
    {
        $this->repository->delete($id);
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
            ->when($params['name'] ?? null, function ($query, $value) {
                return $query->byName($value);
            })
            ->with($with)
            ->withCount($withCount);
    }

    protected function getSelectOrDefault(array $select = null): array|string
    {
        return $select ?? $this->repository->getTable() . ".*";
    }

    public function getNewInstance()
    {
        return $this->repository->getNewInstance();
    }
}
