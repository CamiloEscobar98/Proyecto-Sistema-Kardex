<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends AbstractModelService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }
}
