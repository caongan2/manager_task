@extends('layout.master')
@section('title',' Thêm danh sách khách hàng')
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Customer</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <form action="" method="post">
            @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="inputName">First Name</label>
                <input type="text" name="first" id="inputName" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputDescription">Last Name</label>
                <input type="text" name="last" id="inputDescription" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputClientCompany">Phone</label>
                <input type="text" id="inputClientCompany" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">City</label>
                <input type="text" id="inputProjectLeader" name="city" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Accept</button>
            <a href="{{route('customers.list')}}" class="btn btn-secondary">Cancel</a>
        </div>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
@endsection
