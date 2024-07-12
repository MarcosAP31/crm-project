<?php
namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerRepository
{
    public function getAll()
    {
        return Customer::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastCustomers = Customer::latest('CustomerId')->first();

        // Customers if a record was found
        if ($lastCustomers) {
            return $lastCustomers;
        } else {
            // If no records are found, return a response indicating that the table is empty
            throw new ModelNotFoundException('No records found');
        }
    }

    public function store(array $data)
    {
        return Customer::create($data);
    }

    public function getById($customerId)
    {
        $Customer = Customer::where('CustomerId', $customerId)->firstOrFail();
        return $Customer;
    }

    public function update(array $data, $customerId)
    {
        // Find the Customers record by CustomerId
        $Customer = Customer::where('CustomerId', $customerId)->firstOrFail();

        // Update the Customers record with the request data
        $Customer->update($data);

        // Return the updated Customers record
        return $Customer;
    }

    public function delete($customerId)
    {
        // Find the Customers record by CustomerId
        $Customer = Customer::where('CustomerId', $customerId)->firstOrFail();

        // Delete the Customers record
        $Customer->delete();

    }
}
?>