@extends('layouts.app')

@section('content')
<style>
    .card {
        border-radius: 0.75rem;
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #4a90e2;
        color: white;
        border-top-left-radius: 0.75rem;
        border-top-right-radius: 0.75rem;
        font-weight: 600;
        font-size: 1.5rem;
        letter-spacing: 0.02em;
    }
    label.form-label {
        font-weight: 500;
        color: #333;
    }
    .form-control, .form-select, textarea.form-control {
        border-radius: 0.5rem;
        border: 1.5px solid #ced4da;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .form-control:focus, .form-select:focus, textarea.form-control:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 0.25rem rgba(74, 144, 226, 0.25);
    }
    .invalid-feedback {
        font-size: 0.9rem;
        font-weight: 500;
        color: #dc3545;
    }
    .btn-primary {
        background-color: #4a90e2;
        border: none;
        font-weight: 600;
        padding: 0.6rem 1.6rem;
        border-radius: 0.5rem;
        box-shadow: 0 0.3rem 0.6rem rgba(74, 144, 226, 0.4);
    }
    .btn-primary:hover {
        background-color: #357abd;
    }
</style>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header text-end pe-4">
                    Edit Appointment
                </div>

                <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class="p-4">
                    @csrf
                    @method('PUT')

                    {{-- Student Select --}}
                    <div class="mb-4">
                        <label for="student_id" class="form-label">Student</label>
                        <select name="student_id" id="student_id"
                                class="form-select @error('student_id') is-invalid @enderror"
                                required>
                            <option value="">-- Select Student --</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}"
                                    {{ old('student_id', $appointment->student_id) == $student->id ? 'selected' : '' }}>
                                    {{ $student->fname }} {{ $student->lname }}
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Title --}}
                    <div class="mb-4">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $appointment->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row gx-3 mb-4">
                        {{-- Appointment Date --}}
                        <div class="col-md-6">
                            <label for="appointment_date" class="form-label">Appointment Date</label>
                            <input type="date" name="appointment_date" id="appointment_date"
                                   class="form-control @error('appointment_date') is-invalid @enderror"
                                   value="{{ old('appointment_date', $appointment->appointment_date) }}" required>
                            @error('appointment_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Appointment Time --}}
                        <div class="col-md-6">
                            <label for="appointment_time" class="form-label">Appointment Time</label>
                            <input type="time" name="appointment_time" id="appointment_time"
                                   class="form-control @error('appointment_time') is-invalid @enderror"
                                   value="{{ old('appointment_time', $appointment->appointment_time) }}" required>
                            @error('appointment_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="mb-4">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror"
                                required>
                            <option value="Pending" {{ old('status', $appointment->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Completed" {{ old('status', $appointment->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Remarks --}}
                    <div class="mb-4">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea name="remarks" id="remarks" rows="3"
                                  class="form-control @error('remarks') is-invalid @enderror">{{ old('remarks', $appointment->remarks) }}</textarea>
                        @error('remarks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-100">Update Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
