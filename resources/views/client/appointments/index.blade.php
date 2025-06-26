@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title mb-0">Manage Appointments</h3>
                    <div class="ms-auto">
                        <a href="{{ url('client/appointments/create') }}" class="btn btn-outline-primary btn-sm">Add Appointment</a>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body p-0">
                    @if(session('success'))
                        <div class="alert alert-success m-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Schedule</th>
                                <th>Title</th>
                                <th>Remarks</th>
                                <th>Student</th>
                                <th>Status</th>
                                <th style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $key => $appointment)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($appointment->appointment_date . ' ' . $appointment->appointment_time)
                                            ->format('d F Y  h:i A') }}
                                    </td>
                                    <td>{{ $appointment->title }}</td>
                                    <td>{{ $appointment->remarks }}</td>
                                    <td>{{ $appointment->student->fname ?? '' }} {{ $appointment->student->lname ?? '' }}</td>
                                    <td>
                                        @if($appointment->status == 'Completed')
                                            <span class="badge bg-success">Completed</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('client/appointments', $appointment->id) }}/edit" class="btn btn-success btn-sm">Edit</a>
                                        <button type="button" onclick="removeAppointment({{ $appointment->id }})" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">No appointments available</td>
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

@section('footer')
<footer class="footer mt-auto py-3 border-top bg-light">
  <div class="container text-center">
    <small class="text-muted">&copy; {{ date('Y') }} Your Company or Project Name. All rights reserved.</small>
  </div>
</footer>
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
            success: function () {
                location.reload();
            },
            error: function () {
                alert('Something went wrong.');
            }
        });
    }
}
</script>
@endpush
