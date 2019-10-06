<?php

namespace App\Services;

use App\Repositories\MovieRepository;

class MovieService
{
    public function __construct(MovieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function getList()
    {
        return $this->repository->getList();
    }
}
