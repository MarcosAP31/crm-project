<?php

namespace App\ServicesImpl;

use App\Services\TaskService;
use App\Repositories\TaskRepository;

class TaskServiceImpl implements TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks()
    {
        return $this->taskRepository->getAll();
    }

    public function getLatestTask()
    {
        return $this->taskRepository->getLatest();
    }

    public function storeTask(array $data)
    {
        return $this->taskRepository->store($data);
    }

    public function getTaskById($taskId)
    {
        return $this->taskRepository->getById($taskId);
    }

    public function updateTask(array $data, $taskId)
    {
        return $this->taskRepository->update($data, $taskId);
    }

    public function deleteTask($taskId)
    {
        $this->taskRepository->delete($taskId);
    }
}