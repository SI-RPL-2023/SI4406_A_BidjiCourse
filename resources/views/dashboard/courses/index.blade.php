<!---UI Preview--->

@extends('dashboard.layouts.main')
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
            @for ($i = 1; $i <= 5; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>Title</td>
                    <td>Cover</td>
                    <td>Rating</td>
                    <td>
                        <div class="d-flex">
                            <form action="" method="get">
                                @csrf
                                <button id="detail" type="submit" class="btn btn-sm btn-warning text-light">
                                    <i class="ti ti-eye fs-5"></i>
                                </button>
                            </form>
                            <form action="" method="get">
                                @csrf
                                <button id="edit" type="submit" class="btn btn-sm btn-primary mx-2">
                                    <i class="ti ti-edit fs-5"></i>
                                </button>
                            </form>
                            <form action="" method="post">
                                @csrf
                                @method('delete')
                                <button id="delete" type="submit" class="btn btn-sm btn-danger">
                                    <i class="ti ti-trash fs-5"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endfor
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
