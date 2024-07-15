<?php

namespace App\ServicesImpl;

use App\Services\AccountService;
use App\Repositories\AccountRepository;

class AccountServiceImpl implements AccountService
{
    protected $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function getAllAccounts()
    {
        return $this->accountRepository->getAll();
    }

    public function getLatestAccount()
    {
        return $this->accountRepository->getLatest();
    }

    public function storeAccount(array $data)
    {
        return $this->accountRepository->store($data);
    }

    public function getAccountById($accountId)
    {
        return $this->accountRepository->getById($accountId);
    }

    public function updateAccount(array $data, $accountId)
    {
        return $this->accountRepository->update($data, $accountId);
    }

    public function deleteAccount($accountId)
    {
        $this->accountRepository->delete($accountId);
    }
}