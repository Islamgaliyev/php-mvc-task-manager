<?php

namespace App\Services;

use App\Contracts\Services\BaseService;
use App\Core\Request;
use App\Helpers\Auth;
use App\Models\UserModel;

class AuthService extends BaseService
{
    public function __construct()
    {
    }

    public function signIn(Request $request)
    {
        $data = $request->all();
        $user = new UserModel();
        $findUser = $user->db
            ->where('login', '=', $data->email)
            ->where('password', '=', md5($data->password))
            ->first();

        if (empty($findUser)) {
            throw new \Exception("Invalid credentials");
        }

        Auth::attempt($findUser);
        return true;
    }
}