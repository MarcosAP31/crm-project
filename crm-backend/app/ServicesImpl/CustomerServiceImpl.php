<?php

namespace App\ServicesImpl;

use App\Services\CustomerService;
use App\Repositories\CustomerRepository;

class CustomerServiceImpl implements CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAllCustomers()
    {
        return $this->customerRepository->getAll();
    }

    public function getLatestCustomer()
    {
        return $this->customerRepository->getLatest();
    }

    public function storeCustomer(array $data)
    {
        return $this->customerRepository->store($data);
    }

    public function getCustomerById($customerId)
    {
        return $this->customerRepository->getById($customerId);
    }

    public function updateCustomer(array $data, $customerId)
    {
        return $this->customerRepository->update($data, $customerId);
    }

    public function deleteCustomer($customerId)
    {
        $this->customerRepository->delete($customerId);
    }
}