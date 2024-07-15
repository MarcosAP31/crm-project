<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    public function index()
    {
        $customers = $this->customerService->getAllCustomers();
        return $customers;
    }

    public function getLatest()
    {
        $customer = $this->customerService->getLatestCustomer();
        if ($customer) {
            return $customer;
        } else {
            // If no records are found, return a response indicating that the record is not found
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $customer = $this->customerService->storeCustomer($data);
        return response()->json(['message' => 'Customer stored successfully', 'customer' => $customer], 201);
    }

    public function show($customerId)
    {
        $customer = $this->customerService->getCustomerById($customerId);
        return $customer;
    }

    public function update(Request $request, $customerId)
    {
        $data = $request->all();
        $customer = $this->customerService->updateCustomer($data,$customerId);

        // Return the updated Customers record
        return response()->json(['message' => 'Customer updated successfully', 'customer' => $customer], 201);
    }

    public function destroy($customerId)
    {
        $this->customerService->deleteCustomer($customerId);

        // Return a JSON response with a 204 status code
        return new JsonResponse(null, 204);
    }
}
