<?php

namespace App\Validators;

use App\Core\Request;
use Rakit\Validation\Validator;

class TaskCreateRequestValidator extends Validator
{
    public function makeValidation(Request $request)
    {
        $validation = $this->make(
            $request->post,
            [
                'email' => 'required|email',
                'title' => 'required',
                'user'  => 'required',
            ]
        );

        $validation->validate();

        if ($validation->fails()) {
            $errorMessage = $this->getFirstErrorMessage($validation);
            throw new \Exception($errorMessage);
        }
        return true;
    }

    private function getFirstErrorMessage(&$validation)
    {
        $validationFail = $validation->errors()->firstOfAll();
        reset($validationFail);
        $firstMessageKey = key($validationFail);
        return $validationFail[$firstMessageKey];
    }
}
