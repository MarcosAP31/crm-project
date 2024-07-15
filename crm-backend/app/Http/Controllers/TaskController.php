<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return $tasks;
    }

    public function getLatest()
    {
        $task = $this->taskService->getLatestTask();
        if ($task) {
            return $task;
        } else {
            // If no records are found, return a response indicating that the record is not found
            return response()->json(['message' => 'Task not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $task = $this->taskService->storeTask($data);
        return response()->json(['message' => 'Task stored successfully', 'task' => $task], 201);
    }

    public function show($taskId)
    {
        $task = $this->taskService->getTaskById($taskId);
        return $task;
    }

    public function update(Request $request, $taskId)
    {
        $data = $request->all();
        $task = $this->taskService->updateTask($data,$taskId);

        // Return the updated Tasks record
        return response()->json(['message' => 'Task updated successfully', 'task' => $task], 201);
    }

    public function destroy($taskId)
    {
        $this->taskService->deleteTask($taskId);

        // Return a JSON response with a 204 status code
        return new JsonResponse(null, 204);
    }
}
