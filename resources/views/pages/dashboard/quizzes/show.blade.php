@extends('pages.dashboard.layouts.main')
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
                                            <span>{{ chr(64 + $loop->iteration) }}. {{ $option->answer }}</span>
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
                    @if ($course->quiz->time_limit)
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
                        @foreach ($allQuestions as $question)
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
