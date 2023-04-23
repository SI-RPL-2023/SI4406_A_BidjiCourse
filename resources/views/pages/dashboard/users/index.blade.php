@extends('pages.dashboard.layouts.main')
@section('head-script')
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
@section('main')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
        <h3>Users</h3>
    </div>
    <table class="table-striped table-bordered w-100 table" id="users-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @php
                    $delete_tlp = auth()->user()->id == $user->id ? 'Untuk alasan keamanan, anda tidak diperbolehkan menghapus akun anda sendiri' : 'Delete this user (' . $user->full_name . ')';
                    $edit_tlp = auth()->user()->id == $user->id ? 'Untuk alasan keamanan, anda tidak diperbolehkan mengubah role anda sendiri' : "Edit this user's role";
                @endphp
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><span class="badge text-bg-{{ $user->is_admin ? 'danger' : 'success' }}">{{ $user->is_admin ? 'Admin' : 'Student' }}</span></td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-right">
                        <div class="d-grid d-flex gap-2">
                            <a class="btn btn-sm btn-warning" id="detail" data-bs-toggle="tooltip" data-bs-title="View this user's detail" href="{{ route('users.show', $user->id) }}">
                                <i class="ti ti-eye"></i> Detail
                            </a>

                            <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-title="{{ $edit_tlp }}" tabindex="0">
                                <a class="{{ auth()->user()->id == $user->id ? 'disabled' : '' }} btn btn-sm btn-primary" id="edit" href="{{ route('users.edit', $user->id) }}">
                                    <i class="ti ti-edit"></i> Edit Role
                                </a>
                            </span>

                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-title="{{ $delete_tlp }}" tabindex="0">
                                    <button class="btn btn-sm btn-danger delete-user-btn" id="delete" type="submit" {{ auth()->user()->id == $user->id ? 'disabled' : '' }}>
                                        <i class="ti ti-trash"></i> Delete
                                    </button>
                                </span>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                pageLength: 5,
                scrollX: true,
                paging: true,
                searching: true,
                info: true,
                stateSave: true,
                lengthMenu: [5, 10, 25, 50, 100]
            });
            $('.dataTables_info, .dataTables_paginate').addClass('mt-4 mb-5');
            $('.dataTables_length').addClass('mb-4');
        })
    </script>
@endsection
