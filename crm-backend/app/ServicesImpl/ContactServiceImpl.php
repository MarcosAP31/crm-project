<?php

namespace App\ServicesImpl;

use App\Services\ContactService;
use App\Repositories\ContactRepository;

class ContactServiceImpl implements ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getAllContacts()
    {
        return $this->contactRepository->getAll();
    }

    public function getLatestContact()
    {
        return $this->contactRepository->getLatest();
    }

    public function storeContact(array $data)
    {
        return $this->contactRepository->store($data);
    }

    public function getContactById($contactId)
    {
        return $this->contactRepository->getById($contactId);
    }

    public function updateContact(array $data, $contactId)
    {
        return $this->contactRepository->update($data, $contactId);
    }

    public function deleteContact($contactId)
    {
        $this->contactRepository->delete($contactId);
    }
}