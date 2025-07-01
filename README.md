@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update User Profile</h3>
                </div>

                <!-- Success Alert -->
                @if (session('success'))
                    <div class="alert alert-success m-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form Start -->
                <form action="{{ url('client/profile/' . auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <!-- Full Name -->
                        <div class="form-group mb-2">
                            <label for="name">User Fullname</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   id="name" placeholder="Enter fullname"
                                   value="{{ auth()->user()->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-2">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" placeholder="Enter email"
                                   value="{{ auth()->user()->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Retype Password -->
                        <div class="form-group mb-2">
                            <label for="password_confirmation">Retype Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                   id="password_confirmation" placeholder="Retype Password">
                        </div>

                        <!-- Contact Number -->
                        <div class="form-group mb-2">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror"
                                   id="contact_number" placeholder="Enter contact number"
                                   value="{{ auth()->user()->contact_number }}">
                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Enable One Time Password -->
                        <div class="form-group mb-2">
                            <label>Enable One Time Password</label>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_otp_enabled" id="is_otp_enabled1" value="1"
                                        {{ auth()->user()->is_otp_enabled == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_otp_enabled1">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_otp_enabled" id="is_otp_enabled2" value="0"
                                        {{ auth()->user()->is_otp_enabled == 0 || is_null(auth()->user()->is_otp_enabled) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_otp_enabled2">No</label>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Photo -->
                        <div class="form-group mb-2">
                            <label for="photo">Profile Photo</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo">
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @if(auth()->user()->photo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile Photo" class="img-thumbnail" style="max-height: 120px;">
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
