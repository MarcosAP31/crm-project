<?php

namespace App\Services;

interface LeadService
{
    public function getAllLeads();
    
    public function getLatestLead();
    
    public function storeLead(array $data);

    public function getLeadById($leadId);

    public function updateLead(array $data, $leadId);

    public function deleteLead($leadId);
}