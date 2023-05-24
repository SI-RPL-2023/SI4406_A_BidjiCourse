@extends('layouts.main')
@section('navbar')
    @include('layouts.navbar-simple', ['route' => route('activities.index') . '#quiz-histories', 'title' => $title, 'category' => $result->quiz->course->category->name, 'categoryRoute' => route('materi.index', ['category' => $result->quiz->course->category->slug])])
@endsection
@section('style')
    <style>
        main {
            margin-top: 100px;
        }

        body {
            background: #f8f9fa
        }

        section {
            /* padding-top: 100px; */
        }

        .btn-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(35px, 1fr));
            gap: 7px;
            margin-top: 5px;
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
            align-items: center;
        }

        .radio-container label input {
            position: absolute;
            left: -9999px;
        }

        .radio-container label input:checked+span {
            color: white;
            /* background-color: #414181; */
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

        td {
            padding: 15px !important;
        }

        .result-title {
            text-align: right;
            font-weight: bold;
            width: 30%;
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-md-5 mb-4">
                <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>'">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('activities.index') }}">Aktifitas</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('activities.index') . '#quiz-histories' }}">Quiz Histories</a></li>
                        <li class="breadcrumb-item active">{{ $result->quiz->name }}</li>
                    </ol>
                </nav>
                <div class="container rounded bg-white" style="padding: 50px; overflow-x:auto;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="result-title">Attempt</td>
                                <td class="result-text">{{ $result->attempt }}</td>
                            </tr>
                            <tr>
                                <td class="result-title">Course</td>
                                <td class="result-text"><a class="text-decoration-none" href="{{ route('materi.show', $result->quiz->course->slug) }}">{{ $result->quiz->course->title }}</a></td>
                            </tr>
                            <tr>
                                <td class="result-title">Mata Pelajaran</td>
                                <td class="result-text"><a class="text-decoration-none" href="{{ route('materi.index', ['category' => $result->quiz->course->category->slug]) }}">{{ $result->quiz->course->category->name }}</a></td>
                            </tr>
                            <tr>
                                <td class="result-title">State</td>
                                <td class="result-text">{{ $result->state }}</td>
                            </tr>
                            <tr>
                                <td class="result-title">Started on</td>
                                <td class="result-text">{{ Carbon\Carbon::parse($result->created_at)->format('l, j F Y, g:i A') }}</td>
                            </tr>
                            <tr>
                                <td class="result-title">Completed on</td>
                                <td class="result-text">{{ Carbon\Carbon::parse($result->updated_at)->format('l, j F Y, g:i A') }}</td>
                            </tr>
                            <tr>
                                <td class="result-title">Marks</td>
                                <td class="result-text">{{ $result->correct_answer }} / {{ $result->total_questions }}</td>
                            </tr>
                            <tr>
                                <td class="result-title">Time taken</td>
                                <td class="result-text">{{ $result->updated_at->diff($result->created_at)->format('%h jam • %i menit • %s detik') }}</td>
                            </tr>
                            <tr>
                                <td class="result-title">Score</td>
                                <td class="result-text">
                                    <span class="badge text-bg-{{ $result->score < 50 ? 'danger' : ($result->score < 70 ? 'warning' : 'success') }}"> {{ $result->score }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php $radioNumber = 1; ?>
            @foreach ($qna as $question)
                <section id="no-{{ $loop->iteration }}">
                    <div class="col-md-8 mx-md-5 mb-4">
                        <div class="container rounded bg-white" style="padding: 50px">
                            <h5 class="mb-4">Pertanyaan ke <strong class="fs-3">{{ $loop->iteration }}</strong> dari <strong class="fs-5">{{ $result->total_questions }}</strong></h5>
                            <div class="alert border-1 mb-3 border text-black" style="background-color: #f8f9fa">
                                {!! $question->question !!}
                            </div>
                            <p>
                                Jawabanmu {{ $question->is_correct ? 'benar' : 'kurang tepat' }}
                                <i class="ti ti-{{ $question->is_correct ? 'check' : 'x' }} fs-4 text-{{ $question->is_correct ? 'success' : 'danger' }}"></i>
                            </p>
                            <div class="ml-5">
                                <div class="radio-container">
                                    @foreach ($question->answers as $answer)
                                        <style>
                                            .radio-{{ $radioNumber }} input:checked+span {
                                                background-color: {{ $question->is_correct ? '#157347' : '#bb2d3b' }};
                                            }
                                        </style>
                                        <label class="radio-{{ $radioNumber }}">
                                            <input class="quiz-answer text-bg-danger" type="radio" {{ $answer->selected ? 'checked' : '' }} disabled>
                                            <span>{{ chr(64 + $loop->iteration) }}. {{ $answer->option }}</span>
                                        </label>
                                        <?php $radioNumber++; ?>
                                    @endforeach
                                </div>
                            </div>
                            @if (!$question->is_correct)
                                @foreach ($question->answers as $answer)
                                    @if ($answer->is_correct)
                                        <div class="alert alert-warning mt-3">
                                            <strong>Jawaban yang benar adalah:</strong>
                                            <br>{{ $answer->option }}
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            <div class="alert alert-success mt-3">
                                <strong>Penjelasan:</strong>
                                <br>{!! $question->answer_explanation !!}
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
            <div class="col-md-4">
                <div class="sidebar">
                    <h3 class="quiz-nav">Quiz Navigation</h3>
                    <span class="finish-review" style="cursor: pointer;" x-on:click="document.location.href = `{{ route('activities.index') . '#quiz-histories' }}`" x-data="{ hover: false }" x-on:mouseenter="hover = true" x-on:mouseleave="hover = false" x-bind:class="hover ? 'text-success' : ''">
                        <i x-bind:class="hover ? 'ti ti-circle-check' : ''"></i>
                        Finish review...
                    </span>
                    <div class="btn-container">
                        @foreach ($qna as $question)
                            <a class="quiz-nav-button btn btn-{{ $question->is_correct ? 'success' : 'danger' }} btn-sm" href="#no-{{ $loop->iteration }}">{{ $loop->iteration }}</a>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <a class="btn btn-dark shadow" href="{{ route('quiz.show', $result->quiz->course->slug) }}" x-data x-on:click="loader()"><i class="ti ti-rotate"></i> Kerjakan ulang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
