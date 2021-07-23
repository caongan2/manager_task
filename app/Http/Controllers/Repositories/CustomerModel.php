<?php

namespace App\Http\Controllers\Repositories;

use App\Models\Customer;

class CustomerModel
{
    public function getPostById()
    {
        return Customer::orderBy('customerNumber', 'desc')->get();
    }

    public function create()
    {
        return view('customer.create');
    }
}
