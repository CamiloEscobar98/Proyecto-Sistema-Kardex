<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends AbstractModelService
{
    /** @var UserRepository */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
