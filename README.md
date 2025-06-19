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
                    <th style="width: 120px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                @empty

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
