<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;
use App\Services\BaseService;

class UserServiceImp extends BaseService implements UserService
{
    protected $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }
}
