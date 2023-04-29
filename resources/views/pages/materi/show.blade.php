@extends('layouts.main')
@section('navbar')
    @include('layouts.navbar-simple', ['route' => route('materi.index'), 'title' => $course->title, 'category' => $course->category->name])
@endsection
@section('footer')
    @include('layouts.footer')
@endsection
@section('style')
    <style>
        .materi {
            padding-left: 250px;
            padding-right: 250px;
        }

        @media (max-width: 1100px) {
            .materi {
                padding-left: 50px;
                padding-right: 50px;
            }
        }

        @media (max-width: 768px) {
            .materi {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
@endsection
@section('main')
    <div class="d-flex justify-content-center" style="padding-top: 100px">
        <div class="container">
            <div class="materi">
                <img class="img-fluid mb-4 mt-2 rounded" id="course-cover" src="{{ $course->cover }}" alt="{{ $course->title }}">
                <br>
                {!! $course->body !!}
            </div>
            @if ($course->quiz)
                @php
                    $ongoing = $course->quiz
                        ->results()
                        ->where('user_id', auth()->user()->id)
                        ->where('state', 'Ongoing')
                        ->exists();
                @endphp
                <div class="d-flex justify-content-center mt-5">
                    <a class="{{ !$ongoing ? 'attempt' : 'continue' }}-quiz btn btn-{{ !$ongoing ? 'success' : 'warning' }}" href="{{ route('quiz.show', $course->slug) }}">{{ !$ongoing ? 'Kerjakan' : 'Lanjutkan' }} Quiz</a>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.attempt-quiz').on('click', function(e) {
                e.preventDefault();
                const html = '<p>Ukur sampai mana pemahamanmu tentang course ini dengan mengerjakan quiz</p>' +
                    '<span>Jumlah soal: <strong><span class="badge text-bg-warning border">{{ count($course->quiz->questions) }}</span></strong></span><br>'
                @if ($course->quiz->time_limit > 0)
                    +'<span>Waktu pengerjaan: <strong><span class="badge text-bg-success border">{{ floor($course->quiz->time_limit / 60) }} Menit</span></strong></span><br>'
                @endif
                const url = "{{ route('quiz.show', $course->slug) }}";
                Swal.fire({
                    title: 'Quiz',
                    html: html,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#0d6efd',
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'Kerjakan',
                    cancelButtonText: 'Nanti saja',
                }).then((result) => {
                    if (result.value) {
                        document.location.href = $(this).attr('href');
                        loader();
                    }
                })
            });
            $('.continue-quiz').on('click', function(e) {
                loader();
            });
        });
    </script>
@endsection
