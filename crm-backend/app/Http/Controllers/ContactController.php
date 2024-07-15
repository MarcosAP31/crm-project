<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    public function index()
    {
        $contacts = $this->contactService->getAllContacts();
        return $contacts;
    }

    public function getLatest()
    {
        $contact = $this->contactService->getLatestContact();
        if ($contact) {
            return $contact;
        } else {
            // If no records are found, return a response indicating that the record is not found
            return response()->json(['message' => 'Contact not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $contact = $this->contactService->storeContact($data);
        return response()->json(['message' => 'Contact stored successfully', 'contact' => $contact], 201);
    }

    public function show($contactId)
    {
        $contact = $this->contactService->getContactById($contactId);
        return $contact;
    }

    public function update(Request $request, $contactId)
    {
        $data = $request->all();
        $contact = $this->contactService->updateContact($data,$contactId);

        // Return the updated Contacts record
        return response()->json(['message' => 'Contact updated successfully', 'contact' => $contact], 201);
    }

    public function destroy($contactId)
    {
        $this->contactService->deleteContact($contactId);

        // Return a JSON response with a 204 status code
        return new JsonResponse(null, 204);
    }
}
