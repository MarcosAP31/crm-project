<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivityService;

class ActivityController extends Controller
{
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }
    public function index()
    {
        $activities = $this->activityService->getAllActivities();
        return $activities;
    }

    public function getLatest()
    {
        $activity = $this->activityService->getLatestActivity();
        if ($activity) {
            return $activity;
        } else {
            // If no records are found, return a response indicating that the record is not found
            return response()->json(['message' => 'Activity not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $activity = $this->activityService->storeActivity($data);
        return response()->json(['message' => 'Activity stored successfully', 'activity' => $activity], 201);
    }

    public function show($activityId)
    {
        $activity = $this->activityService->getActivityById($activityId);
        return $activity;
    }

    public function update(Request $request, $activityId)
    {
        $data = $request->all();
        $activity = $this->activityService->updateActivity($data,$activityId);

        // Return the updated Activitys record
        return response()->json(['message' => 'Activity updated successfully', 'activity' => $activity], 201);
    }

    public function destroy($activityId)
    {
        $this->activityService->deleteActivity($activityId);

        // Return a JSON response with a 204 status code
        return new JsonResponse(null, 204);
    }
}
