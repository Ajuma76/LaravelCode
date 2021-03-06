<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $companies = Company::all();


        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers', 'companies'));
    }


    public function store()
    {
        $data = request()->validate([
           'name'=>'required|min:3',
            'email'=>'required|email',
            'phone'=>'required|min:7',
            'active'=>'required',
            'company_id'=>'required'
        ]);

        Customer::create($data);

        return back();
    }

}
