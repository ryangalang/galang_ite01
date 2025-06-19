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
        <div class="form-group mb-2">
            <label for="name">User Fullname</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter fullname" />
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="email">Email address</label>
            <input type="email" name="email"class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" />
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="password_confirmation">Retype Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Retype Password" />
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>

    </div>
</div>
</div>
@endsection