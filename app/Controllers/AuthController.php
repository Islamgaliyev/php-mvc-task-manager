<?php

namespace App\Controllers;

use App\Contracts\Controllers\BaseController;
use App\Core\Request;
use App\Factory\ServiceFactory;
use App\Factory\ValidatorFactory;
use App\Helpers\Auth;

class AuthController extends BaseController
{
    private $authService;
    private $signInRequestValidator;

    public function __construct()
    {
        parent::__construct();
        // Factories is needed for getting rid of strong coupling.
        $this->authService = ServiceFactory::make('AuthService');
        $this->signInRequestValidator = ValidatorFactory::make('SignInRequestValidator');
    }

    public function login(Request $request)
    {
        if (!Auth::user()) {
            echo $this->view->render('auth.login');
            return;
        }
        redirect(route('task/index'));
    }

    public function signIn(Request $request)
    {
        try {
            $this->signInRequestValidator->makeValidation($request);
            $this->authService->signIn($request);

            redirect(route('task/index'));
        } catch (\Exception $e) {
            echo $this->view->render('auth.login', ['error' => $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        if (Auth::user()) {
            Auth::logout();
        }
        redirect(route('auth/login'));
    }
}