<?php

namespace App\Controllers;

use App\Contracts\Controllers\BaseController;
use App\Core\Request;
use App\Factory\ServiceFactory;
use App\Factory\ValidatorFactory;
use App\Helpers\Auth;

class TaskController extends BaseController
{
    private $taskService;
    private $taskUpdateRequestValidator;
    private $taskCreateRequestValidator;

    public function __construct()
    {
        parent::__construct();
        // Factories is needed for getting rid of strong coupling.
        $this->taskService = ServiceFactory::make('TaskService');
        $this->taskUpdateRequestValidator = ValidatorFactory::make('TaskUpdateRequestValidator');
        $this->taskCreateRequestValidator = ValidatorFactory::make('TaskCreateRequestValidator');
    }

    public function index(Request $request)
    {
        $tasks = $this->taskService->all();
        echo $this->view->render('tasks.index', compact('tasks'));
    }

    public function edit(Request $request)
    {
        try {
            // Refactor: This should be checked in middlewares
            if (!Auth::user()->isAdmin) {
                redirect('task/index');
            }

            $taskId = $request->all()->taskId;
            $task = $this->taskService->getById($taskId);


            echo $this->view->render('tasks.edit', compact('task'));
        } catch (\Exception $e) {
            echo $this->view->render('errors.notFound', ['message' => $e->getMessage()]);
        }
    }

    public function create()
    {
        echo $this->view->render('tasks.create');
    }

    public function update(Request $request)
    {
        try {
            // Refactor: This should be checked in middlewares
            if (!Auth::user()) {
                redirect(route('task/index'));
            }

            $this->taskUpdateRequestValidator->makeValidation($request);
            $this->taskService->update($request);
            redirect(route('task/index'));
        } catch (\Exception $e) {
            $task = $this->taskService->getById($request->all()->taskId);
            echo $this->view->render('tasks.edit', ['error' => $e->getMessage(), 'task' => $task]);
        }
    }

    public function store(Request $request)
    {
        try {
            $this->taskCreateRequestValidator->makeValidation($request);
            $this->taskService->store($request);
            redirect(route('task/index'));
        } catch (\Exception $e) {
            echo $this->view->render('tasks.create', ['error' => $e->getMessage()]);
        }
    }
}