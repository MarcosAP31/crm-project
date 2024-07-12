<?php
namespace App\Repositories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LeadRepository
{
    public function getAll()
    {
        return Lead::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastLeads = Lead::latest('LeadId')->first();

        // Leads if a record was found
        if ($lastLeads) {
            return $lastLeads;
        } else {
            // If no records are found, return a response indicating that the table is empty
            throw new ModelNotFoundException('No records found');
        }
    }

    public function store(array $data)
    {
        return Lead::create($data);
    }

    public function getById($leadId)
    {
        $Lead = Lead::where('LeadId', $leadId)->firstOrFail();
        return $Lead;
    }

    public function update(array $data, $leadId)
    {
        // Find the Leads record by LeadId
        $Lead = Lead::where('LeadId', $leadId)->firstOrFail();

        // Update the Leads record with the request data
        $Lead->update($data);

        // Return the updated Leads record
        return $Lead;
    }

    public function delete($leadId)
    {
        // Find the Leads record by LeadId
        $Lead = Lead::where('LeadId', $leadId)->firstOrFail();

        // Delete the Leads record
        $Lead->delete();

    }
}
?>