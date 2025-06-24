@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage Appointments</h3>

                    <div class="card-tools">
                        <a href="{{ url('client/appointments/create') }}" class="btn btn-outline-primary btn-sm">Add New Appointment</a>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body p-0">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Student</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $key => $appointments)
                                <tr>    
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $appointments->student->fname ?? '' }} {{ $appointments->student->lname ?? '' }}</td>
                                    <td>{{ $appointments->title }}</td>
                                    <td>{{ $appointments->appointment_date }}</td>
                                    <td>{{ $appointments->appointment_time }}</td>
                                    <td>{{ $appointments->status }}</td>
                                    <td>{{ $appointments->remarks }}</td>
                                    <td>
                                        <a href="{{ url('client/appointments', $appointments->id) }}/edit" class="btn btn-success btn-sm">Edit</a>
                                        <a href="javascript:;" onclick="removeAppointment({{ $appointments->id }})" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr> 
                            @empty
                                <tr>
                                    <td class="text-center" colspan="8">No appointments available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /.container -->
@endsection

@push('scripts')
<script>
function removeAppointment(id) {
    if(confirm('Are you sure you want to delete this appointment?')) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('client/appointments') }}/" + id,
            dataType: "json",
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                location.reload();
            },
            error: function (xhr) {
                alert('Something went wrong.');
            }
        });
    }
}
</script>
@endpush
