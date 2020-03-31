<?php

namespace App\Services;

use App\Core\Request;
use App\Models\TaskModel;

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
        $task = new TaskModel();
        $isEdited = $this->checkIsEdited($data->taskId, $data->title);
        $task->db
            ->where('id', $data->taskId)
            ->update(
                [
                    'email' => $data->email,
                    'title' => $data->title,
                    'user' => $data->user,
                    'isDone' => isset($data->isDone) ? 1 : 0,
                    'isEdited' => $isEdited
                ]
            );
        return true;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $task = new TaskModel();
        $task->db
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

    private function checkIsEdited($taskId, $title)
    {
        $task = new TaskModel();
        $findTask = $task->db
            ->where('id', $taskId)
            ->where('title', $title)
            ->first();

        return $findTask ? 0 : 1;
    }

}
