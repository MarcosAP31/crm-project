<?php

namespace App\Services;

interface CustomerService
{
    public function getAllCustomers();
    
    public function getLatestCustomer();
    
    public function storeCustomer(array $data);

    public function getCustomerById($customerId);

    public function updateCustomer(array $data, $customerId);

    public function deleteCustomer($customerId);
}