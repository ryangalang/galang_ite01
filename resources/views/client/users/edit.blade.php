@extends('layouts.app')
@section('content')
<div class="container">
<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
        <div class="card-header">
    <h3 class="card-title">Update User Info</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form action="{{ url('client/users, $user->id') }}" method="POST">
    @csrf
    @method('PUT')
    @include('client.users.form')
    <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>

    </div>
</div>
</div>
@endsection