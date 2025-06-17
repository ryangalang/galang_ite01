@extends('layouts.app', ['page_title' => 'Create Student'])
@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('students.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" class="form-control" />
            </div>
            <div class="form-group mb-3">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" class="form-control" />
            </div>
            <div class="form-group mb-3">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" />
            </div>
            
            <div class="form-group mb-3">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        
        </form>
    </div>
</div>
@endsection