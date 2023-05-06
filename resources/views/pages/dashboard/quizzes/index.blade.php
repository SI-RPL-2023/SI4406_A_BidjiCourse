@extends('pages.dashboard.layouts.main')
@section('head-script')
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
@section('main')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
        <h3>Quizzes</h3>
        <a class="btn btn-sm btn-primary" href="{{ route('quizzes.create') }}">
            <i class="ti ti-pencil-plus"></i> Add a quiz
        </a>
    </div>
    <table class="table-striped table-bordered w-100 table" id="quizzes-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Name</th>
                <th>Course</th>
                <th>Category</th>
                <th>Total Question(s)</th>
                <th>Time Limit</th>
                <th>Added by</th>
                <th>Last Edited by</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->id }}</td>
                    <td>
                        <span class="badge text-bg-{{ $quiz->status == 'Published' ? 'success' : 'warning' }}" data-bs-toggle="tooltip" data-bs-title="{{ $quiz->status == 'Draft' ? 'Quiz ini masih draft, publish quiz ini agar bisa diakses oleh user' : 'Quiz ini sudah bisa diakses oleh user' }}">{{ $quiz->status }}</span>
                    </td>
                    <td>{{ $quiz->name }}</td>
                    <td>
                        <a class="text-decoration-none" href="{{ route('courses.show', $quiz->course->slug) }}">
                            {{ $quiz->course->title }}
                        </a>
                    </td>
                    <td>{{ $quiz->course->category->name }}</td>
                    <td>{{ $quiz->questions_count }}</td>
                    <td>{{ $quiz->time_limit ? floor($quiz->time_limit / 60) . ' Menit' : 'No Time' }}</td>
                    <td>{{ $quiz->added_by }}<br>({{ $quiz->created_at }})</td>
                    <td>{{ $quiz->last_edited_by }}<br>({{ $quiz->updated_at }})</td>
                    <td class="text-right">
                        <div class="d-grid d-flex gap-2">
                            <a class="btn btn-sm btn-warning" id="add_question" data-bs-toggle="tooltip" data-bs-title="Manage questions for this quiz" href="{{ route('quizzes.showQuestions', $quiz->id) }}"><i class="ti ti-list-numbers"></i></a>
                            <a class="btn btn-sm btn-primary" id="edit" data-bs-toggle="tooltip" data-bs-title="Edit this quiz" href="{{ route('quizzes.edit', $quiz->id) }}"><i class="ti ti-edit"></i></a>
                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="delete-quiz-btn btn btn-sm btn-danger" id="delete" data-bs-toggle="tooltip" data-bs-title="Delete this quiz" type="submit"><i class="ti ti-trash"></i></button>
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
            $('#quizzes-table').DataTable({
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