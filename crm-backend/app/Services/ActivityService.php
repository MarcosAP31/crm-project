<?php

namespace App\Services;

interface ActivityService
{
    public function getAllActivities();
    
    public function getLatestActivity();
    
    public function storeActivity(array $data);

    public function getActivityById($activityId);

    public function updateActivity(array $data, $activityId);

    public function deleteActivity($activityId);
}