<?php

namespace App\Services;

use App\Repositories\BookableSeatRepository;

class BookableSeatService
{
    public function __construct(BookableSeatRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }
}
