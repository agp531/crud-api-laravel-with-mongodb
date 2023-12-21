<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CustomerRepository;
use App\Http\Services\CustomerService;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $service;
    protected $repository;

    public function __construct(CustomerRepository $repository, CustomerService $service)
    {
        $this->repository =  $repository;
        $this->service = $service;
    }

    public function index()
    {
        $customers = $this->repository->index();
        return response()->json($customers);
    }

    public function store(Request $request)
    {
        $customer = $this->service->createCustomer($request->all());
        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        $customer = $this->service->update($id, $request->all());
        return response()->json($customer);
    }

    public function show($id)
    {
        $customer = $this->repository->show($id);
        return response()->json($customer);
    }

    public function destroy($id)
    {
        $customer = $this->repository->delete($id);
        return response()->json([
            'msg' => 'Customer deleted successfull !!',
            'customer' =>  $customer
        ]);
    }
}
