<?php

namespace App\ServicesImpl;

use App\Services\OpportunityService;
use App\Repositories\OpportunityRepository;

class OpportunityServiceImpl implements OpportunityService
{
    protected $opportunityRepository;

    public function __construct(OpportunityRepository $opportunityRepository)
    {
        $this->opportunityRepository = $opportunityRepository;
    }

    public function getAllOpportunities()
    {
        return $this->opportunityRepository->getAll();
    }

    public function getLatestOpportunity()
    {
        return $this->opportunityRepository->getLatest();
    }

    public function storeOpportunity(array $data)
    {
        return $this->opportunityRepository->store($data);
    }

    public function getOpportunityById($opportunityId)
    {
        return $this->opportunityRepository->getById($opportunityId);
    }

    public function updateOpportunity(array $data, $opportunityId)
    {
        return $this->opportunityRepository->update($data, $opportunityId);
    }

    public function deleteOpportunity($opportunityId)
    {
        $this->opportunityRepository->delete($opportunityId);
    }
}