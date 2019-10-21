<?php

namespace App\Repositories;

use App\BookableSeat;

class BookableSeatRepository
{
    protected $model;

    public function __construct(BookableSeat $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function show($id)
    {
        return $this->model->find($id);
    }
}
