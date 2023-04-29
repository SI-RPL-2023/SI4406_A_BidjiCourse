@extends('pages.dashboard.layouts.main')
@section('head-script')
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
@section('main')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
        <h3>Courses</h3>
        <a class="btn btn-sm btn-primary" href="{{ route('courses.create') }}">
            <i class="ti ti-pencil-plus"></i> Add a course
        </a>
    </div>
    <table class="table-striped table-bordered w-100 table" id="courses-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Materi</th>
                {{-- <th>Cover</th> --}}
                <th>Mata Pelajaran</th>
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
                        <span class="badge text-bg-{{ $bg }}" data-bs-toggle="tooltip" data-bs-title="{{ $status == 'Draft' ? 'Course ini masih draft, publish course ini agar bisa diakses oleh user' : 'Course ini sudah bisa diakses oleh user' }}">{{ $status }}</span>
                    </td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->category->name }}</td>
                    {{-- <td><img class="img-fluid rounded" id="" src="{{ $course->cover }}" alt="cover preview" style="
                        width: 150px;
                        height: auto;
                        object-fit: cover;
                        aspect-ratio: 16 / 9;">
                    </td> --}}
                    <td>{{ $rating }}</td>
                    <td class="text-right">
                        <div class="d-grid d-flex gap-2">
                            <a class="btn btn-sm btn-warning" id="detail" data-bs-toggle="tooltip" data-bs-title="View course detail" href="{{ route('courses.show', $course->slug) }}">
                                <i class="ti ti-eye"></i> Preview
                            </a>
                            <a class="btn btn-sm btn-primary" id="edit" data-bs-toggle="tooltip" data-bs-title="Edit course" href="{{ route('courses.edit', $course->slug) }}">
                                <i class="ti ti-edit"></i> Edit
                            </a>
                            <form action="{{ route('courses.destroy', $course->slug) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger delete-course-btn" id="delete" data-bs-toggle="tooltip" data-bs-title="Delete course">
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
        })
    </script>
@endsection
