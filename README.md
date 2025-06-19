@extends('layouts.app')
@section('content')
<div class="container">
<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
        <div class="card-header">
    <h3 class="card-title">Add New User</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form action="{{ url('client/users') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="name">User Fullname</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter fullname" />
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email"class="form-control" id="email" placeholder="Enter email" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
        </div>
        <div class="form-group">
            <label for="password_confirmation">Retype Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Retype Password" />
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>

    </div>
</div>
</div>
@endsection
