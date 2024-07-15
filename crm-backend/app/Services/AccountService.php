<?php

namespace App\Services;

interface AccountService
{
    public function getAllAccounts();
    
    public function getLatestAccount();
    
    public function storeAccount(array $data);

    public function getAccountById($accountId);

    public function updateAccount(array $data, $accountId);

    public function deleteAccount($accountId);
}