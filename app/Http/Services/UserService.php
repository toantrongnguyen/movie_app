<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function updateUser($email, $input)
    {
        return $this->repository->updateUser($email, $input);
    }

    public function getUser()
    {
        return $this->repository->getUser();
    }
}
