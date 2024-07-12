<?php
namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactRepository
{
    public function getAll()
    {
        return Contact::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastContacts = Contact::latest('ContactId')->first();

        // Contacts if a record was found
        if ($lastContacts) {
            return $lastContacts;
        } else {
            // If no records are found, return a response indicating that the table is empty
            throw new ModelNotFoundException('No records found');
        }
    }

    public function store(array $data)
    {
        return Contact::create($data);
    }

    public function getById($contactId)
    {
        $Contact = Contact::where('ContactId', $contactId)->firstOrFail();
        return $Contact;
    }

    public function update(array $data, $contactId)
    {
        // Find the Contacts record by ContactId
        $Contact = Contact::where('ContactId', $contactId)->firstOrFail();

        // Update the Contacts record with the request data
        $Contact->update($data);

        // Return the updated Contacts record
        return $Contact;
    }

    public function delete($contactId)
    {
        // Find the Contacts record by ContactId
        $Contact = Contact::where('ContactId', $contactId)->firstOrFail();

        // Delete the Contacts record
        $Contact->delete();

    }
}
?>