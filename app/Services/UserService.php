<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends AbstractModelService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
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
            ->when($params['except'] ?? null, function ($query, $value) {
                return $query->byNotId($value);
            })
            ->with($with)
            ->withCount($withCount);
    }
}
