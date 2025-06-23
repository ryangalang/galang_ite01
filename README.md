@extends('layouts.app', ['page_title' => 'Students List'])

@section('content')
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                <h3 class="card-title">Manage User</h3>

                <div class="card-tools">
                    <a href="{{ url('client/users/create')}}"class="btn btn-outline-primary btn-sm ">Add New User</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                @session('success')
                <div class="alert alert-success" role="alert">
                    {{ session ('success')}}
                </div>
                @endsession
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
            </div>
        </div>
    </div>
</div>
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
