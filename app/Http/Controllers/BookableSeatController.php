<?php

namespace App\Http\Controllers;

use App\Services\BookableSeatService;
use Illuminate\Http\Request;

class BookableSeatController extends Controller
{
    public function __construct(BookableSeatService $bookableSeatService)
    {
        $this->bookableSeatService = $bookableSeatService;
    }

    public function index(Request $request)
    {
        return [];
    }

    public function show(Request $request, $id)
    {
        $data = $this->bookableSeatService->show($id) ?? [];
        return $data;
    }
}
