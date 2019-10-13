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

    public function getList($params)
    {
        return $this->repository->getList($params);
    }

    public function search($search)
    {
        return $this->repository->search($search);
    }

    public function getFeatureMovie()
    {
        return $this->repository->getFeatureMovie();
    }
}
