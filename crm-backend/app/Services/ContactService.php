<?php

namespace App\Services;

interface ContactService
{
    public function getAllContacts();
    
    public function getLatestContact();
    
    public function storeContact(array $data);

    public function getContactById($contactId);

    public function updateContact(array $data, $contactId);

    public function deleteContact($contactId);
}