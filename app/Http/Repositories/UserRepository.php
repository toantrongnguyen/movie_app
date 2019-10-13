<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Storage;

class UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function updateUser($email, $input)
    {
        return $this->model
            ->where('email', $email)
            ->update($input);
    }
}
