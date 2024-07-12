<?php
namespace App\Repositories;

use App\Models\Account;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AccountRepository
{
    public function getAll()
    {
        return Account::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastAccounts = Account::latest('AccountId')->first();

        // Accounts if a record was found
        if ($lastAccounts) {
            return $lastAccounts;
        } else {
            // If no records are found, return a response indicating that the table is empty
            throw new ModelNotFoundException('No records found');
        }
    }

    public function store(array $data)
    {
        return Account::create($data);
    }

    public function getById($accountId)
    {
        $Account = Account::where('AccountId', $accountId)->firstOrFail();
        return $Account;
    }

    public function update(array $data, $accountId)
    {
        // Find the Accounts record by AccountId
        $Account = Account::where('AccountId', $accountId)->firstOrFail();

        // Update the Accounts record with the request data
        $Account->update($data);

        // Return the updated Accounts record
        return $Account;
    }

    public function delete($accountId)
    {
        // Find the Accounts record by AccountId
        $Account = Account::where('AccountId', $accountId)->firstOrFail();

        // Delete the Accounts record
        $Account->delete();

    }
}
?>