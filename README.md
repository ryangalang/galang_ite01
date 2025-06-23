@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row"
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
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px;">#</th>
                    <th>Created Date</th>
                    <th>User Name</th>
                    <th>EmailADdress</th>
                    <th style="width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $key => $user)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $user->created_date }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('client/users', $user->id) }}/edit" class="btn btn-success btn-sm">Edit</a>
                        <a href="javascript:;" onclick="removeUser({{ $user->id }})" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr> 
                @empty
                <tr>
                    <td class="text-center" colspan=""> No data available</td>
                </tr>
                @endforelse
                
            </tbody>
        </table>
    </div>
    </div>
    <!-- /.card-body -->
</div>
            </div>
</div>
@endsection

@push('script')
<script>
$(document).ready(function(){
    alert('hello');
});
</script>
@endpush
