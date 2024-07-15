<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LeadService;

class LeadController extends Controller
{
    protected $leadService;

    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }
    public function index()
    {
        $leads = $this->leadService->getAllLeads();
        return $leads;
    }

    public function getLatest()
    {
        $lead = $this->leadService->getLatestLead();
        if ($lead) {
            return $lead;
        } else {
            // If no records are found, return a response indicating that the record is not found
            return response()->json(['message' => 'Lead not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $lead = $this->leadService->storeLead($data);
        return response()->json(['message' => 'Lead stored successfully', 'lead' => $lead], 201);
    }

    public function show($leadId)
    {
        $lead = $this->leadService->getLeadById($leadId);
        return $lead;
    }

    public function update(Request $request, $leadId)
    {
        $data = $request->all();
        $lead = $this->leadService->updateLead($data,$leadId);

        // Return the updated Leads record
        return response()->json(['message' => 'Lead updated successfully', 'lead' => $lead], 201);
    }

    public function destroy($leadId)
    {
        $this->leadService->deleteLead($leadId);

        // Return a JSON response with a 204 status code
        return new JsonResponse(null, 204);
    }
}
