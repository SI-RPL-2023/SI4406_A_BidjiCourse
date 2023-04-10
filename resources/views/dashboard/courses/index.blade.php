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
    <table id="courses-table" class="table table-striped table-bordered w-100">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Title</th>
                <th>Cover</th>
                <th>Rating</th>
                <th>Action</th>
                <th>Last Edited by</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                {{-- @for ($i = 0; $i < 10; $i++) --}}
                @php
                    if (!isset(\App\Models\User::find($course->last_edited_by)->full_name)) {
                        $last_edited_by = 'deleted user';
                    } else {
                        $last_edited_by = \App\Models\User::find($course->last_edited_by)->full_name;
                    }
                    if ($course->draft) {
                        $status = 'Draft';
                        $bg = 'warning';
                    } else {
                        $status = 'Published';
                        $bg = 'success';
                    }
                    if (!$course->rating) {
                        $rating = 'Not rated';
                    } else {
                        $rating = 'Rated';
                    }
                @endphp
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>
                        <span id="{{ $status }}" class="badge text-bg-{{ $bg }}">{{ $status }}</span>
                    </td>
                    <td>{{ $course->title }}</td>
                    <td><img id="" class="img-fluid rounded" src="{{ $course->cover }}" alt="cover preview"
                            style="
                        width: 150px;
                        height: auto;
                        object-fit: cover;
                        aspect-ratio: 16 / 9;">
                    </td>
                    <td>{{ $rating }}</td>
                    <td class="text-right">
                        <div class="d-grid gap-2 d-flex">
                            <a id="detail" href="{{ route('courses.show', $course->slug) }}"
                                class="btn btn-sm btn-warning">
                                <i class="ti ti-eye"></i> Preview
                            </a>
                            <a id="edit" href="{{ route('courses.edit', $course->slug) }}"
                                class="btn btn-sm btn-primary">
                                <i class="ti ti-edit"></i> Edit
                            </a>
                            <form action="{{ route('courses.destroy', $course->slug) }}" method="post">
                                @csrf
                                @method('delete')
                                <button id="delete" class="btn btn-sm btn-danger delete-course-btn">
                                    <i class="ti ti-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                    <td>{{ $last_edited_by }}<br>({{ $course->updated_at }})</td>
                </tr>
                {{-- @endfor --}}
            @endforeach
        </tbody>
    </table>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('#courses-table').DataTable({
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
            tippy('#Draft', {
                content: 'Course ini masih draft, publish course ini agar bisa diakses oleh user',
            });
            tippy('#Published', {
                content: 'Course ini sudah bisa diakses oleh user',
            });
        })
    </script>
@endsection
