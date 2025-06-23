@extends('layouts.app', ['page_title' => 'Students List'])

@section('content')
    <h2 class="students">{{ $user }}</h2>
    @session('success')
    <div class="alert alert-success" role="alert">
        {{ session ('success')}}
    </div>
    @endsession
    @if($isAdmin)
    <div class="d-flex justify-content-end">
        <a href="{{ url('client/students/create') }}" class="btn btn-primary">Create Student</a>
    </div>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $key => $student)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $student->fname . ' ' . $student->lname }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->contact_number }}</td>
                        <td>
                            <a href="{{ url('client/students', $student->id)}}/edit" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete this students?')">Delete</a>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $students->links() !!}
    @else
        <h1>Admin is False</h1>
    @endif    
@endsection

@section('css')
    <style>
        .students {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
@endsection

@push('scripts')
@endpush
