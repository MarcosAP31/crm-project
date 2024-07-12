<?php
namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskRepository
{
    public function getAll()
    {
        return Task::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastTasks = Task::latest('TaskId')->first();

        // Tasks if a record was found
        if ($lastTasks) {
            return $lastTasks;
        } else {
            // If no records are found, return a response indicating that the table is empty
            throw new ModelNotFoundException('No records found');
        }
    }

    public function store(array $data)
    {
        return Task::create($data);
    }

    public function getById($taskId)
    {
        $Task = Task::where('TaskId', $taskId)->firstOrFail();
        return $Task;
    }

    public function update(array $data, $taskId)
    {
        // Find the Tasks record by TaskId
        $Task = Task::where('TaskId', $taskId)->firstOrFail();

        // Update the Tasks record with the request data
        $Task->update($data);

        // Return the updated Tasks record
        return $Task;
    }

    public function delete($taskId)
    {
        // Find the Tasks record by TaskId
        $Task = Task::where('TaskId', $taskId)->firstOrFail();

        // Delete the Tasks record
        $Task->delete();

    }
}
?>