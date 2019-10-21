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
        $data = $this->bookableSeatService->show($id);

        if (!$data) {
            $data = $this->bookableSeatService->create($id);
        }

        return $data;
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();

        $result = $this->bookableSeatService->updateSeat($id, $input);

        if ($result) {
            return ['status' => 'Done'];
        }

        return ['status' => 'Fail'];
    }
}
