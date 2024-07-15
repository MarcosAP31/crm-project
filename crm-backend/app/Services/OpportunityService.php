<?php

namespace App\Services;

interface OpportunityService
{
    public function getAllOpportunities();
    
    public function getLatestOpportunity();
    
    public function storeOpportunity(array $data);

    public function getOpportunityById($opportunityId);

    public function updateOpportunity(array $data, $opportunityId);

    public function deleteOpportunity($opportunityId);
}