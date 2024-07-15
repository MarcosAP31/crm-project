<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AccountService;

class AccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }
    public function index()
    {
        $accounts = $this->accountService->getAllAccounts();
        return $accounts;
    }

    public function getLatest()
    {
        $account = $this->accountService->getLatestAccount();
        if ($account) {
            return $account;
        } else {
            // If no records are found, return a response indicating that the record is not found
            return response()->json(['message' => 'Account not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $account = $this->accountService->storeAccount($data);
        return response()->json(['message' => 'Account stored successfully', 'account' => $account], 201);
    }

    public function show($accountId)
    {
        $account = $this->accountService->getAccountById($accountId);
        return $account;
    }

    public function update(Request $request, $accountId)
    {
        $data = $request->all();
        $account = $this->accountService->updateAccount($data,$accountId);

        // Return the updated Accounts record
        return response()->json(['message' => 'Account updated successfully', 'account' => $account], 201);
    }

    public function destroy($accountId)
    {
        $this->accountService->deleteAccount($accountId);

        // Return a JSON response with a 204 status code
        return new JsonResponse(null, 204);
    }
}
