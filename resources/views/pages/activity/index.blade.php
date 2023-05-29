@extends('layouts.main')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('footer')
    @include('layouts.footer')
@endsection
@section('head-script')
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
@section('main')
    <div class="container" >
        <h1 class="text-center">Aktifitas</h1>
        <div class="container-md">
            <div class="row">
                <section id="activities">
                    <div class="card mt-4 border shadow">
                        <div class="card-header fs-6 bg-white">
                            <span class="badge bg-light rounded-1 text-dark">
                                <i class="ti ti-notebook"></i>
                            </span> Aktifitas Belajarmu
                        </div>
                        <div class="card-body">
                            @forelse ($activities as $activity)
                                <div class="alert bg-light text-dark border" id="{{ $activity->course->slug }}">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-auto">
                                            <p class="fw-bold my-1">{{ Carbon\Carbon::parse($activity->updated_at)->format('l, j F Y, g:i A') }}</p>
                                            <h5>{{ $activity->course->title }}</h5>
                                        </div>
                                        <div class="col-md-auto d-flex gap-2">
                                            <a class="text-decoration-none text-primary" href="{{ route('materi.show', $activity->course->slug) }}"><i class="ti ti-book-2"></i> Lanjutkan</a>
                                            |
                                            <div class="remove-activities text-decoration-none text-danger" data-slug="{{ $activity->course->slug }}" data-href="{{ route('activities.update', $activity->id) }}" style="cursor: pointer"><i class="ti ti-trash"></i> Hapus Histori</div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center">
                                    <h5 class="card-title fw-bold">Kamu belum membuka materi apapun</h5>
                                    <p class="card-text">Yuk, jelajahi semua materi yang ada di Bidji Course!</p>
                                    <a class="btn btn-sm btn-primary" href="{{ route('materi.index') }}">Mulai Belajar</a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </section>

                <section id="quiz-histories">
                    <div class="card mt-4 border shadow">
                        <div class="card-header fs-6 bg-white">
                            <span class="badge bg-light rounded-1 text-dark">
                                <i class="ti ti-checklist"></i>
                            </span> Quiz Histories
                        </div>
                        <div class="card-body">
                            @if ($quizResults->isEmpty())
                                <div class="text-center">
                                    <h5 class="card-title fw-bold">Kamu belum mengerjakan quiz apapun</h5>
                                    <p class="card-text">Yuk, ukur kemampuanmu dengan mengerjakan quiz yang ada di Bidji Course!</p>
                                    <a class="btn btn-sm btn-success" href="{{ route('materi.index') }}">Mulai Kerjakan</a>
                                </div>
                            @else
                                <table class="table-striped table-bordered w-100 table" id="quiz-histories-table">
                                    <thead>
                                        <tr>
                                            <th>Attempt</th>
                                            <th>State</th>
                                            <th>Quiz</th>
                                            <th>Course</th>
                                            <th>Score</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($quizResults as $quizResult)
                                            <tr>
                                                <td>{{ $quizResult->attempt }}</td>
                                                <td>
                                                    @if ($quizResult->state == 'Finished')
                                                        <span class="text-success fw-bold">{{ $quizResult->state }}</span><br>
                                                        Completed on {{ Carbon\Carbon::parse($quizResult->updated_at)->format('l, j F Y, g:i A') }}
                                                    @else
                                                        <span class="text-warning fw-bold">{{ $quizResult->state }}</span><br>
                                                        Started on {{ Carbon\Carbon::parse($quizResult->created_at)->format('l, j F Y, g:i A') }}
                                                    @endif
                                                </td>
                                                <td>{{ $quizResult->quiz->name }}</td>
                                                <td>{{ $quizResult->quiz->course->title }}</td>
                                                <td>
                                                    @if ($quizResult->state == 'Finished')
                                                        <span class="badge text-bg-{{ $quizResult->score < 50 ? 'danger' : ($quizResult->score < 70 ? 'warning' : 'success') }}"> {{ $quizResult->score }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($quizResult->state == 'Finished')
                                                        <a class="text-decoration-none" href="{{ route('quiz.result', $quizResult->id) }}">Review</a>
                                                    @else
                                                        <a class="text-decoration-none" href="{{ route('quiz.show', $quizResult->quiz->course->slug) }}">Lanjutkan</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@if (!$quizResults->isEmpty() || !$activities->isEmpty())
    @section('script')
        <script>
            $(document).ready(function() {
                $('#quiz-histories-table').DataTable({
                    pageLength: 10,
                    scrollX: true,
                    paging: true,
                    searching: true,
                    info: true,
                    stateSave: true,
                    lengthMenu: [5, 10, 25, 50, 100]
                });
                $('.dataTables_info, .dataTables_paginate').addClass('mt-4 mb-5');
                $('.dataTables_length').addClass('mb-4');

                let activities = {{ $activities->count() }};
                $('.remove-activities').click(function() {
                    swalCustom.fire({
                        title: "Hapus Histori Belajar",
                        html: "Apakah kamu yakin ingin menghapus histori belajarmu?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Hapus",
                        cancelButtonText: "Cancel",
                    }).then((result) => {
                        if (result.value) {
                            loader('Menghapus...', 200);
                            const url = $(this).data('href');
                            const slug = $(this).data('slug');
                            const html = $(this).html();
                            $(this).html('Menghapus...');
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: url,
                                type: 'PATCH',
                                success: function(response) {
                                    Swal.close();
                                    console.log(response);
                                    Toast.fire({
                                        icon: response['toast'],
                                        text: response['message']
                                    });
                                    activities--;
                                    $(`#${slug}`).fadeOut();
                                    if (activities == 0) {
                                        location.reload();
                                    }
                                },
                                error: function(error) {
                                    Swal.close();
                                    console.error(error);
                                    $(`#${slug}`).html(html);
                                    Toast.fire({
                                        icon: 'error',
                                        text: 'Gagal menghapus histori pembelajaran.',
                                    });
                                }
                            });
                        }
                    });
                });
            });
        </script>
    @endsection
@endif
