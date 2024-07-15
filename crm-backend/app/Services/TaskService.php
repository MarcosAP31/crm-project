<?php

namespace App\Services;

interface TaskService
{
    public function getAllTasks();
    
    public function getLatestTask();
    
    public function storeTask(array $data);

    public function getTaskById($taskId);

    public function updateTask(array $data, $taskId);

    public function deleteTask($taskId);
}