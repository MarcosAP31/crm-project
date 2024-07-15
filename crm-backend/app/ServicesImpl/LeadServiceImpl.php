<?php

namespace App\ServicesImpl;

use App\Services\LeadService;
use App\Repositories\LeadRepository;

class LeadServiceImpl implements LeadService
{
    protected $leadRepository;

    public function __construct(LeadRepository $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }

    public function getAllLeads()
    {
        return $this->leadRepository->getAll();
    }

    public function getLatestLead()
    {
        return $this->leadRepository->getLatest();
    }

    public function storeLead(array $data)
    {
        return $this->leadRepository->store($data);
    }

    public function getLeadById($leadId)
    {
        return $this->leadRepository->getById($leadId);
    }

    public function updateLead(array $data, $leadId)
    {
        return $this->leadRepository->update($data, $leadId);
    }

    public function deleteLead($leadId)
    {
        $this->leadRepository->delete($leadId);
    }
}