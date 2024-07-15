<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpportunityService;

class OpportunityController extends Controller
{
    protected $opportunityService;

    public function __construct(OpportunityService $opportunityService)
    {
        $this->opportunityService = $opportunityService;
    }
    public function index()
    {
        $opportunities = $this->opportunityService->getAllOpportunities();
        return $opportunities;
    }

    public function getLatest()
    {
        $opportunity = $this->opportunityService->getLatestOpportunity();
        if ($opportunity) {
            return $opportunity;
        } else {
            // If no records are found, return a response indicating that the record is not found
            return response()->json(['message' => 'Opportunity not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $opportunity = $this->opportunityService->storeOpportunity($data);
        return response()->json(['message' => 'Opportunity stored successfully', 'opportunity' => $opportunity], 201);
    }

    public function show($opportunityId)
    {
        $opportunity = $this->opportunityService->getOpportunityById($opportunityId);
        return $opportunity;
    }

    public function update(Request $request, $opportunityId)
    {
        $data = $request->all();
        $opportunity = $this->opportunityService->updateOpportunity($data,$opportunityId);

        // Return the updated Opportunitys record
        return response()->json(['message' => 'Opportunity updated successfully', 'opportunity' => $opportunity], 201);
    }

    public function destroy($opportunityId)
    {
        $this->opportunityService->deleteOpportunity($opportunityId);

        // Return a JSON response with a 204 status code
        return new JsonResponse(null, 204);
    }
}
