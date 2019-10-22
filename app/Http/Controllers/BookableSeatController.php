<?php

namespace App\Http\Controllers;

use App\Services\BookableSeatService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        $data = $this->bookableSeatService->show($id);

        if (!$data) {
            $data = $this->bookableSeatService->create($id);
        }

        return $data;
    }

    public function update(Request $request, $id)
    {
        $input = $request->input('seat');

        if (!$input) {
            return response(['message' => 'Bad payload'], Response::HTTP_BAD_REQUEST);
        }

        $result = $this->bookableSeatService->updateSeat($id, $input, Auth::user()->id);

        if ($result) {
            return response(['status' => 'Done', 'data' => $result]);
        }

        return response(['message' => 'Unauthorize to implement that'], Response::HTTP_FORBIDDEN);
    }
}
