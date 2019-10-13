<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index(Request $request)
    {
        $query = $request->query();
        $params = [];
        $params['page'] = $query['page'] ?? 1;
        $params['sort'] = $query['sort'] ?? 0;
        $params['order'] = $query['order'] ?? config('common.order.asc');
        $data = $this->movieService->getList($params);
        return $data;
    }

    public function search(Request $request)
    {
        $search = trim($request->query('search', ''));

        return $this->movieService->search($search);
    }

    public function featureMovie(Request $request)
    {
        $data = $this->movieService->getFeatureMovie();

        return $data;
    }
}
