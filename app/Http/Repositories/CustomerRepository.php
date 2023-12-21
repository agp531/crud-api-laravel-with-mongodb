<?php

namespace App\Http\Repositories;
use App\Models\Customer;

class CustomerRepository
{

    public function index()
    {
        return Customer::all();
    }

    public function createCustomer(array $data)
    {
        return Customer::create($data);
    }

    public function update($customer, array $data)
    {
        $customer = Customer::findOrFail($customer);
        $customer->update($data);
        return $customer;
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return $customer;
    }
    
    public function delete($customerId)
    {
        $customer = Customer::find($customerId);
        $customer->delete();
        return $customer;
    }

}