<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $user = $request->user();

        if (isset($user->avatar)) {
            $user->avatar = Storage::url($user->avatar);
        }

        return $user;
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'avatar' => ['file'],
        ]);

        if ($validator->fails()) {
            return response($validator->messages(), Response::HTTP_BAD_REQUEST);
        }

        $input = [
            'name' => $request->input('name')
        ];

        if ($request->hasFile('avatar')) {
            $path = Storage::putFile(
                'public/avatars',
                $request->file('avatar')
            );
            $input['avatar'] = $path;
        }

        $result = $this->userService->updateUser($request->user()->email, $input);

        if ($result) {
            return ['message' => 'Update successfully'];
        }

        return ['message' => 'Update fail'];
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'old_password' => ['required', 'string', 'min:6'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public function changePassword(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response($validator->messages(), Response::HTTP_BAD_REQUEST);
        }

        return $request->user();
    }
}
