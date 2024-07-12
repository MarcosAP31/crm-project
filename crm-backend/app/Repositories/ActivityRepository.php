<?php
namespace App\Repositories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ActivityRepository
{
    public function getAll()
    {
        return Activity::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastActivitys = Activity::latest('ActivityId')->first();

        // Activitys if a record was found
        if ($lastActivitys) {
            return $lastActivitys;
        } else {
            // If no records are found, return a response indicating that the table is empty
            throw new ModelNotFoundException('No records found');
        }
    }

    public function store(array $data)
    {
        return Activity::create($data);
    }

    public function getById($activityId)
    {
        $Activity = Activity::where('ActivityId', $activityId)->firstOrFail();
        return $Activity;
    }

    public function update(array $data, $activityId)
    {
        // Find the Activitys record by ActivityId
        $Activity = Activity::where('ActivityId', $activityId)->firstOrFail();

        // Update the Activitys record with the request data
        $Activity->update($data);

        // Return the updated Activitys record
        return $Activity;
    }

    public function delete($activityId)
    {
        // Find the Activitys record by ActivityId
        $Activity = Activity::where('ActivityId', $activityId)->firstOrFail();

        // Delete the Activitys record
        $Activity->delete();

    }
}
?>