
@extends('layout.master')
@section('title')
    {{$customer->contactFirstName}}
@endsection
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
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$customer->customerNumber}}</td>
                        <td>{{$customer->contactFirstName}}</td>
                        <td>{{$customer->contactLastName}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->city}}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{route('customers.list')}}" class="btn btn-secondary">Cancel</a>

        </div>
        <!-- /.card-body -->
    </div>

@endsection
