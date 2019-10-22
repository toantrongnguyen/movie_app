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

    public function create($id)
    {
        return $this->repository->create($id);
    }

    public function updateSeat($id, $input, $userId)
    {
        return $this->repository->updateSeat($id, $input, $userId);
    }
}
