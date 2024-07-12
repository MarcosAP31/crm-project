<?php
namespace App\Repositories;

use App\Models\Opportunity;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OpportunityRepository
{
    public function getAll()
    {
        return Opportunity::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastOpportunitys = Opportunity::latest('OpportunityId')->first();

        // Opportunitys if a record was found
        if ($lastOpportunitys) {
            return $lastOpportunitys;
        } else {
            // If no records are found, return a response indicating that the table is empty
            throw new ModelNotFoundException('No records found');
        }
    }

    public function store(array $data)
    {
        return Opportunity::create($data);
    }

    public function getById($opportunityId)
    {
        $Opportunity = Opportunity::where('OpportunityId', $opportunityId)->firstOrFail();
        return $Opportunity;
    }

    public function update(array $data, $opportunityId)
    {
        // Find the Opportunitys record by OpportunityId
        $Opportunity = Opportunity::where('OpportunityId', $opportunityId)->firstOrFail();

        // Update the Opportunitys record with the request data
        $Opportunity->update($data);

        // Return the updated Opportunitys record
        return $Opportunity;
    }

    public function delete($opportunityId)
    {
        // Find the Opportunitys record by OpportunityId
        $Opportunity = Opportunity::where('OpportunityId', $opportunityId)->firstOrFail();

        // Delete the Opportunitys record
        $Opportunity->delete();

    }
}
?>