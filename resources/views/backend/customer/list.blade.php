@extends('layout.master')
@section('title','Danh sách khách hàng')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div>
    @endif
    <div class="card">
        <div class="btn btn-success">
            <h3 class="card-title">Customers</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->customerNumber}}</td>
                        <td>{{$customer->contactFirstName}}</td>
                        <td>{{$customer->contactLastName}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->city}}</td>
                        <td>
                            <a href="{{route('customers.profile', $customer->customerNumber)}}"><i class="fa fa-user fa-2x"></i></a>
                            <a href="{{route('customer.edit', $customer->customerNumber)}}"><i class="far fa-edit fa-2x"></i></a>
                            <a href="{{route('customer.delete', $customer->customerNumber)}}"><i class="far fa-trash-alt tm-product-delete-icon fa-2x"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{ $customers->links() }}

@endsection
