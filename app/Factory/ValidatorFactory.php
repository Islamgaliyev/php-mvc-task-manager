<?php

namespace App\Factory;

use App\Contracts\Factory\BaseFactory;
use App\Validators\SignInRequestValidator;
use App\Validators\TaskCreateRequestValidator;
use App\Validators\TaskUpdateRequestValidator;


class ValidatorFactory extends BaseFactory
{
    public static function make($validator)
    {
        if ($validator == 'SignInRequestValidator') {
            return new SignInRequestValidator();
        }

        if ($validator == 'TaskUpdateRequestValidator') {
            return new TaskUpdateRequestValidator();
        }

        if ($validator == 'TaskCreateRequestValidator') {
            return new TaskCreateRequestValidator();
        }
    }

}
