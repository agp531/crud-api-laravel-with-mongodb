<?php

namespace App\Http\Services;
use App\Models\Customer;
use App\Http\Repositories\CustomerRepository;

class CustomerService
{
    protected $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createCustomer(array $data)
    {
        return $this->repository->createCustomer($data);
    }

    public function update($id, array $data)
    {
        $customer = $this->repository->update($id, $data);
        return $customer;
    }
}