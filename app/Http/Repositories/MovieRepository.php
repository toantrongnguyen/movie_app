<?php

namespace App\Repositories;

use App\Movie;

class MovieRepository
{
    protected $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    public function all()
    {
        return $this->movie->all();
    }

    public function getList()
    {
        return $this->movie
            ->with(['genres' => function ($query) {
                $query->select('genre_title');
            }])
            ->get();
    }

    public function find($id)
    {
        return $this->movie->find($id);
    }
}
