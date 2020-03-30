<?php

namespace App\Services;

use App\Core\Request;
use App\Models\TaskModel;
use voku\helper\Paginator;


class TaskService
{
    public function __construct()
    {
    }

    public function all()
    {
        return (new TaskModel())->db->get();
    }

    public function getAllCount()
    {
        return (new TaskModel())->db->count();
    }

    public function getById($taskId)
    {
        $task = (new TaskModel())->db->where('id', $taskId)->first();
        if (!$task) {
            throw new \Exception("Model not found");
        }
        return $task;
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $user = new TaskModel();
        $user->db
            ->where('id', $data->taskId)
            ->update(
                [
                    'email' => $data->email,
                    'title' => $data->title,
                    'user' => $data->user,
                    'isDone' => isset($data->isDone) ? 1 : 0
                ]
            );
        return true;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = new TaskModel();
        $user->db
            ->insert(
                [
                    'email' => $data->email,
                    'title' => $data->title,
                    'user' => $data->user,
                    'isDone' => isset($data->isDone) ? 1 : 0
                ]
            );
        return true;
    }

}
