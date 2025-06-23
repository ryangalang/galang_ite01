@extends('layouts.app', ['page_title' => 'Create Student'])
@section('content')
<div class="row">
    <div class="col-md-6">
        @session('success')
        <div class="alert alert-success" role="alert">
            {{ session ('success')}}
        </div>
        @endsession
        <form action="{{ route('students.update', $student->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" class="form-control" value="{{ $student->fname}}" />
                @error('fname')
                <p class="text-danger">{{ $message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" class="form-control" value="{{ $student->lname}}" />
                @error('lname')
                <p class="text-danger">{{ $message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $student->email}}" />
                @error('email')
                <p class="text-danger">{{ $message}}</p>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ $student->contact_number}}" />
                @error('contact_number')
                <p class="text-danger">{{ $message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type ="hidden" name="id" value="{{ $student->id }}" />
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection