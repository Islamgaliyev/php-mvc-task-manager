<?php

namespace App\Validators;

use App\Core\Request;
use Rakit\Validation\Validator;

class SignInRequestValidator extends Validator
{
    public function makeValidation(Request $request)
    {
        $validation = $this->make(
            $request->post,
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $validation->validate();

        if ($validation->fails()) {
            if ($validation->errors()->has('email')) {
                throw new \Exception($validation->errors()->first('email'));
            }
            throw new \Exception($validation->errors()->first('password'));
        }
        return true;
    }
}
