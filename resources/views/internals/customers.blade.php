@extends('layout')

@section('title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h3>Customer List</h3>
            <form action="customers" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    <div>{{$errors->first('name')}}</div>
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    <div>{{$errors->first('email')}}</div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control" value="{{old('phone')}}">
                    <div>{{$errors->first('phone')}}</div>
                </div>
                <div class="form-group">
                    <label for="active">Status</label>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>Select Customer Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button class="btn btn-info">Save</button>
                @csrf
            </form>
        </div>
    </div>
    <br>
    <br>
    <hr>
    <div class="row">
        <div class="col-6">
            <ul>
                <h3>Active Customers</h3>
                @foreach($activeCustomers as $activeCustomer)
                    <li>
                        {{$activeCustomer->name}} <br> {{$activeCustomer->company->name}}
                        {{$activeCustomer->phone}}{{$activeCustomer->active}}
                    </li>
            </ul>
            @endforeach
        </div>
        <div class="col-6">
            <ul>
                <h3>Inactive Customers</h3>
                @foreach($inactiveCustomers as $inactiveCustomer)
                    <li>
                        {{$inactiveCustomer->name}} <br> {{$inactiveCustomer->company->name}}
                        {{$inactiveCustomer->phone}}{{$inactiveCustomer->active}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @foreach($companies as $company)
                <h3>{{$company->name}}</h3>

                <ul>
                   @foreach($company->customers as $customer)
                       <li>{{$customer->name}}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>


@endsection
