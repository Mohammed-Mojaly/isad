@extends('admin.admin-app')
@section('content')

@section('style')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"> --}}
@endsection

<style>
    #user_table_length label select{
        width: 4rem !important;
    }
</style>

<div class="container">

    <div align="right" class="mt-4">
        <a href="{{route('users.create')}}" name="add" id="add_data" class="btn bg-green-400 text-white"> <i class="bi bi-plus-square"></i> Add</a>
    </div>
    <br />
    <table id="user_table" class="w-full text-sm text-left text-gray-500">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">Name</th>
                <th scope="col" class="py-3 px-6">Email</th>
                <th scope="col" class="py-3 px-6">Role</th>
                <th scope="col" class="py-3 px-6">Action</th>
                <th>
                    <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i class="bi bi-backspace-reverse-fill"></i></button>
                </th>
            </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
$(document).ready(function() {
     $('#user_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('admin.users_data') }}",
        "columns":[
            { "data": "name" },
            { "data": "email" },
            { "data": "Role", orderable:false, searchable: false},
            { "data": "action", orderable:false, searchable: false},
            { "data":"checkbox", orderable:false, searchable:false}
        ]
     });
});
</script>




 @endsection
