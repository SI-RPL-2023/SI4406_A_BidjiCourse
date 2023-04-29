@extends('layouts.main')
@section('navbar')
    @include('layouts.navbar-simple', ['route' => route('materi.show', $course->slug), 'title' => $title, 'category' => $course->category->name])
@endsection
@section('head-script')
    <link href="/css/TimeCircles.css" rel="stylesheet">
    <script type="text/javascript" src="/js/TimeCircles.js"></script>
@endsection
@section('style')
    <style>
        main {
            margin-top: 100px;
        }

        html {
            background: #f8f9fa
        }

        .btn-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(35px, 1fr));
            gap: 7px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: 300px;
            padding: 20px;
            background-color: white;
        }

        .quiz-nav {
            margin-top: 100px;
        }

        .quiz-nav-button {
            cursor: pointer;
            width: 35px;
            height: 35px;
            transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
            display: flex;
            align-items: center;
            justify-content: center
        }

        .quiz-nav-button:disabled {
            pointer-events: none;
        }

        .quiz-nav-button:hover {
            color: #fff;
            box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
            transform: translateY(-5px);
        }

        .quiz-nav-button:active {
            box-shadow: none;
            transform: translateY(0);
        }

        .radio-container {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }

        .radio-container label {
            display: flex;
            cursor: pointer;
            font-weight: 500;
            position: relative;
            overflow: hidden;
            margin-bottom: 0.375em;
        }

        .radio-container label input {
            position: absolute;
            left: -9999px;
        }

        .radio-container label input:checked+span {
            background-color: #414181;
            color: white;
        }

        .radio-container label input:checked+span:before {
            box-shadow: inset 0 0 0 0.4375em #00005c;
        }

        .radio-container label span {
            display: flex;
            align-items: center;
            padding: 0.375em 0.75em 0.375em 0.375em;
            border-radius: 99em;
            transition: 0.25s ease;
            /* color: #414181; */
        }

        .radio-container label span:hover {
            background-color: #d6d6e5;
        }

        .radio-container label span:before {
            display: flex;
            flex-shrink: 0;
            content: "";
            background-color: #fff;
            width: 1.5em;
            height: 1.5em;
            border-radius: 50%;
            margin-right: 0.375em;
            transition: 0.25s ease;
            /* box-shadow: inset 0 0 0 0.125em #00005c; */
            box-shadow: inset 0 0 0 0.125em #000000;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: static;
                width: 100%;
            }

            .content {
                margin-right: 0;
            }

            .quiz-nav {
                margin-top: 0px;
            }
        }
    </style>
@endsection
@section('main')
    @php
        $userId = auth()->user()->id;
    @endphp
    <div class="container-fluid bg-body-tertiary">
        <div class="row">
            <div class="col-md-8 mx-md-5 mb-4">
                @foreach ($questions as $question)
                    @php
                        $quizAttempt = \App\Models\QuizAttempt::where('quiz_question_id', $question->id)
                            ->where('user_id', $userId)
                            ->first();
                        $selectedAnswerId = null;
                        if ($quizAttempt) {
                            $selectedAnswerId = $quizAttempt->quiz_answer_id;
                        }
                        $flag = \App\Models\QuizAttempt::where('user_id', $userId)
                            ->where('quiz_question_id', $question->id)
                            ->where('flag', true)
                            ->exists();
                    @endphp
                    <div class="container rounded bg-white" style="padding: 50px">
                        <h5 class="mb-4">Pertanyaan ke <strong class="fs-3">{{ $questions->currentPage() }}</strong> dari <strong class="fs-5">{{ $questions->total() }}</strong></h5>
                        <div class="alert alert-light mb-3">
                            <p>{{ $question->question }}</p>
                        </div>
                        <p>Pilih jawabanmu:</p>
                        <div class="ml-5">
                            <form id="quiz_radio" action="{{ route('quiz.store') }}" method="POST">
                                <input name="question_id" type="hidden" value="{{ $question->id }}">
                                <input name="quiz_id" type="hidden" value="{{ $course->quiz->id }}">
                                <div class="radio-container">
                                    @foreach ($question->answers as $option)
                                        <label>
                                            <input class="quiz-answer" name="answer_id" type="radio" value="{{ $option->id }}" {{ $selectedAnswerId == $option->id ? 'checked' : '' }}>
                                            <span>{{ chr(64 + $loop->iteration) }}. {{ $option->answer }} {{ $option->is_correct ? 'o' : '' }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </form>
                            <br>
                            <span class="flag_toggle" data-bs-placement="right" data-bs-toggle="tooltip" data-bs-title="Tandai pertanyaan ini jika kamu ingin mengerjakannya nanti" data-quiz-id="{{ $course->quiz->id }}" data-question-id="{{ $question->id }}" data-url="{{ route('quiz.flag', [$course->quiz->id, $question->id]) }}
                                " style="cursor: pointer;">
                                <i class="flag_icon ti ti-flag{{ $flag ? '-filled text-danger' : '' }}"></i>
                                <span class="flag_text">{{ $flag ? 'Remove flag' : 'Flag question' }}</span>
                            </span>
                        </div>
                        <div class="container-fluid mt-5">
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-dark {{ $questions->currentPage() == 1 ? 'opacity-0 disabled' : '' }}" id="prev" href="{{ $questions->previousPageUrl() }}"><i class="ti ti-chevron-left"></i>
                                    Previous</a>
                                @if ($questions->currentPage() == $questions->total())
                                    <form id="finish" action="{{ route('quiz.update', $course->quiz->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="finish-attempt btn btn-dark" data-url="{{ route('quiz.check', $course->quiz->id) }}" type="submit"><i class="ti ti-circle-check"></i> Finish Attempt</button>
                                    </form>
                                @else
                                    <a class="btn btn-dark" id="next" href="{{ $questions->nextPageUrl() }}">Next <i class="ti ti-chevron-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <h3 class="quiz-nav">Quiz Navigation</h3>
                    @if ($course->quiz->time_limit > 0)
                        <div id="countdown" data-timer="{{ $time_left }}"></div>
                    @endif
                    <form action="{{ route('quiz.update', $course->quiz->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <span class="finish-attempt" data-url="{{ route('quiz.check', $course->quiz->id) }}" style="cursor: pointer;" x-data="{ hover: false }" x-on:mouseenter="hover = true" x-on:mouseleave="hover = false" x-bind:class="hover ? 'text-success' : ''">
                            <i x-bind:class="hover ? 'ti ti-circle-check' : ''"></i>
                            Finish attempt...
                        </span>
                    </form>
                    <div class="mt-3">
                        <span class="badge text-bg-success">Answered</span>
                        <span class="badge text-bg-warning">Flagged</span>
                        <span class="badge text-bg-dark">Current Page</span>
                    </div>
                    <div class="btn-container">
                        @foreach ($questions_all as $question)
                            @php
                                $quizAttempt = \App\Models\QuizAttempt::where('user_id', $userId)
                                    ->where('quiz_question_id', $question->id)
                                    ->whereNotNull('quiz_answer_id')
                                    ->first();
                                $isAnswered = !is_null($quizAttempt);
                                $isFlagged = \App\Models\QuizAttempt::where('user_id', $userId)
                                    ->where('quiz_question_id', $question->id)
                                    ->where('flag', true)
                                    ->exists();
                                $border = $isAnswered || $isFlagged ? '' : 'outline-';
                                $background = $isAnswered ? 'success' : ($isFlagged ? 'warning' : 'dark');
                                if (Request::query('page') == $loop->iteration) {
                                    $background = 'dark';
                                    $border = '';
                                }
                                if (!Request::has('page') && $loop->index == 0) {
                                    $border = '';
                                }
                            @endphp
                            <a class="quiz-nav-button btn btn-{{ $border }}{{ $background }} btn-sm" href="{{ $course->slug }}?page={{ $loop->iteration }}">{{ $loop->iteration }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            @if ($course->quiz->time_limit > 0)
                const countdown = $("#countdown");
                countdown.TimeCircles({
                    use_background: true,
                    count_past_zero: false,
                    text_size: 0.1,
                    time: {
                        Days: {
                            show: false,
                            text: "Hari"
                        },
                        Hours: {
                            show: true,
                            text: "Jam"
                        },
                        Minutes: {
                            show: true,
                            text: "Menit"
                        },
                        Seconds: {
                            show: true,
                            text: "Detik"
                        }
                    }
                });
                const timeout = setInterval(() => {
                    if (countdown.TimeCircles().getTime() <= 0) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Waktu Habis',
                            html: 'Waktu kamu sudah habis!',
                            confirmButtonColor: '#0d6efd',
                        }).then((result) => {
                            $('.finish-attempt').closest('form').submit();
                        });
                        clearInterval(timeout)
                    }
                }, 500);
            @endif
            const quiz_id = "{{ $course->quiz->id }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
            })
            $('.quiz-answer').on('change', function() {
                const formData = $('#quiz_radio').serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('quiz.store') }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        Toast.fire({
                            icon: response['toast'],
                            text: response['message']
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('.flag_toggle').click(function() {
                const flag_icon = $('.flag_icon');
                const flag_text = $('.flag_text');
                const flag_url = $(this).attr('data-url');
                const flag_flag = $(this).attr('data-flag');
                $.ajax({
                    url: flag_url,
                    type: 'POST',
                    success: function(response) {
                        console.log(response);
                        if (response['flag']) {
                            flag_icon.attr('class', 'flag_icon ti ti-flag-filled text-danger');
                            flag_text.text('Remove flag');
                        } else {
                            flag_icon.attr('class', 'flag_icon ti ti-flag');
                            flag_text.text('Flag question');
                        }
                        Toast.fire({
                            icon: response['toast'],
                            text: response['message']
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('#prev, #next, .finish-attempt').on('click', function(e) {
                loader();
            });
            $('.finish-attempt').on('click', function(e) {
                e.preventDefault();
                const url = $(this).attr('data-url');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        quiz_id: quiz_id
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            title: 'Finish Attempt',
                            html: response['html'],
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#0d6efd',
                            cancelButtonColor: '#dc3545',
                            confirmButtonText: 'Submit',
                            cancelButtonText: 'Cancel',
                        }).then((result) => {
                            if (result.value) {
                                $('.finish-attempt').closest('form').submit();
                            }
                        })
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
