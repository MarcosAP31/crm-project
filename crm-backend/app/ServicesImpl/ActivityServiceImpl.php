<?php

namespace App\ServicesImpl;

use App\Services\ActivityService;
use App\Repositories\ActivityRepository;

class ActivityServiceImpl implements ActivityService
{
    protected $activityRepository;

    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    public function getAllActivities()
    {
        return $this->activityRepository->getAll();
    }

    public function getLatestActivity()
    {
        return $this->activityRepository->getLatest();
    }

    public function storeActivity(array $data)
    {
        return $this->activityRepository->store($data);
    }

    public function getActivityById($activityId)
    {
        return $this->activityRepository->getById($activityId);
    }

    public function updateActivity(array $data, $activityId)
    {
        return $this->activityRepository->update($data, $activityId);
    }

    public function deleteActivity($activityId)
    {
        $this->activityRepository->delete($activityId);
    }
}