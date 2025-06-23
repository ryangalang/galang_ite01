@extends('layouts.app', ['page_title' => 'Edit Student'])

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title">Update Student</h3>
                    <div class="card-tools ms-auto">
                        <a href="{{ url('client/users/create') }}" class="btn btn-outline-danger btn-sm">Back</a>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body p-3">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('students.update', $student->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control" value="{{ $student->fname }}" />
                                    @error('fname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" class="form-control" value="{{ $student->lname }}" />
                                    @error('lname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ $student->contact_number }}" />
                                    @error('contact_number')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <input type="hidden" name="id" value="{{ $student->id }}" />

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div> <!-- /.col-md-6 -->
                    </div> <!-- /.row -->
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container -->
@endsection
