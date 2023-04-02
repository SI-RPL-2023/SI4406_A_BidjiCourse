@extends('dashboard.layouts.main')


@section('head-script')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection


@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>Courses</h3>
        <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">
            <i class="ti ti-pencil-plus"></i> Add a course
        </a>
    </div>
    <table id="dataTables" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Cover</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->cover }}</td>
                    <td>{{ $course->rating }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('courses.show', $course->slug) }}" id="detail"
                                class="btn btn-sm btn-warning text-light">
                                <i class="ti ti-eye fs-5"></i>
                            </a>

                            <a href="{{ route('courses.show', $course->slug) }}" id="edit"
                                class="btn btn-sm btn-primary mx-2">
                                <i class="ti ti-edit fs-5"></i>
                            </a>

                            <form action="" method="post">
                                @csrf
                                @method('delete')
                                <button id="delete" class="btn btn-sm btn-danger">
                                    <i class="ti ti-trash fs-5"></i>
                                </button>
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
            $('#dataTables').DataTable({
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

            tippy('#detail', {
                content: 'View course detail',
            });
            tippy('#edit', {
                content: 'Edit course',
            });
            tippy('#delete', {
                content: 'Delete course',
            });
        })
    </script>
@endsection
