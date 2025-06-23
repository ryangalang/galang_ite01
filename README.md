@endsection

@push('scripts')
<script>
function removeUser(id) {
    $.ajax({
        type: "DELETE",
        url: "{{ url('client/users') }}/" + id,
        dataType: "json",
        success: function (respone) {
            location.reload();
        }
    });
}
</script>
@endpush
