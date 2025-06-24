@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Appointment</h3>
                </div>

                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf

                    {{-- Student Select --}}
                    <div class="form-group mb-3">
                        <label for="student_id">Student</label>
                        <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror" required>
                            <option value="">-- Select Student --</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                    {{ $student->fname }} {{ $student->lname }}
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Title --}}
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}"
                            required
                        >
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Appointment Date --}}
                    <div class="form-group mb-3">
                        <label for="appointment_date">Appointment Date</label>
                        <input
                            type="date"
                            name="appointment_date"
                            id="appointment_date"
                            class="form-control @error('appointment_date') is-invalid @enderror"
                            value="{{ old('appointment_date') }}"
                            required
                        >
                        @error('appointment_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Appointment Time --}}
                    <div class="form-group mb-3">
                        <label for="appointment_time">Appointment Time</label>
                        <input
                            type="time"
                            name="appointment_time"
                            id="appointment_time"
                            class="form-control @error('appointment_time') is-invalid @enderror"
                            value="{{ old('appointment_time') }}"
                            required
                        >
                        @error('appointment_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select
                            name="status"
                            id="status"
                            class="form-control @error('status') is-invalid @enderror"
                            required
                        >
                            <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Remarks --}}
                    <div class="form-group mb-3">
                        <label for="remarks">Remarks</label>
                        <textarea
                            name="remarks"
                            id="remarks"
                            class="form-control @error('remarks') is-invalid @enderror"
                            rows="3"
                        >{{ old('remarks') }}</textarea>
                        @error('remarks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save Appointment</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
