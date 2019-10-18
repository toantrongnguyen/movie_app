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

    public function getList($params)
    {
        $page = $params['page'];
        $sort = $params['sort'];
        $order = $params['order'] == config('common.order.asc') ? 'asc' : 'desc';

        $query = $this->movie
            ->with(['genres' => function ($query) {
                $query->select('id','name');
            }])
            ->limit(config('common.item_per_page'))
            ->offset(config('common.item_per_page') * ($page - 1));

        switch ($sort) {
            case config('common.movie.sort_by_popularity'):
                $query->orderBy('popularity', $order);
                break;
            case config('common.movie.sort_by_release_date'):
                $query->orderBy('vote_average', $order);
                break;
            case config('common.movie.sort_by_vote'):
                $query->orderBy('release_date', $order);
                break;
            default:
        }

        $movies = $query->get();

        $total = Movie::count();

        return [
            'data' => $movies,
            'page' => $page,
            'total' => $total,
        ];
    }

    public function find($id)
    {
        return $this->movie->find($id);
    }

    public function show($id)
    {
        return $this->movie->find($id);
    }

    public function search($search)
    {
        return $this->movie
            ->select('title', 'poster_path', 'id')
            ->where('title', 'LIKE', '%' . $search . '%')
            ->get();
    }

    public function getFeatureMovie()
    {
        return $this->movie
            ->where('is_feature_movie', true)
            ->get();
    }
}
