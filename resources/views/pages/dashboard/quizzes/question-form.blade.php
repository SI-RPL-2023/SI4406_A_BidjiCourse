@extends('pages.dashboard.layouts.main')
@section('style')
    <style>
        .error-message {
            font-size: 14px;
        }
    </style>
@endsection
@section('main')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
        <h3>Questions and Answers: {{ $quiz->name }}</h3>
        <div class="d-grid d-flex gap-2">
            <a class="btn btn-sm btn-warning" href="{{ route('quizzes.index') }}">
                <i class="ti ti-arrow-back-up"></i> Back
            </a>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
                <i class="ti ti-plus"></i> Add Question
            </button>
        </div>
    </div>
    @if ($quiz->questions->count() != 0)
        <h5>Jumlah pertanyaan: <strong>{{ $quiz->questions->count() }}</strong></h5>
        @if ($errors->any())
            <div class="alert alert-danger">
                <h6>Ooppss, terjadi kesalahan saat menginputkan data.</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach ($quiz->questions as $question)
            <section id="{{ $loop->iteration }}">
                <div class="card mt-4 shadow-sm" x-data="{ editMode: false, show: {{ session('number') == $loop->iteration ? 'true' : 'false' }} }">
                    <div class="card-header h6 d-flex justify-content-between align-items-center">
                        <span class="d-flex align-items-center gap-2" style="cursor: pointer;" x-on:click="show = !show">
                            <i class="ti ti-chevron-down fs-5" x-bind:class="{ 'ti-chevron-up': show }"></i>
                            <span class="fw-bold text-success">Pertanyaan {{ $loop->iteration }}: </span>
                            {{ mb_strimwidth($question->question, 0, 50, '...') }}
                        </span>
                        <div class="d-flex gap-2">
                            <template x-if="!editMode">
                                <button class="edit-question-btn btn btn-sm btn-primary" x-transition.duration.500ms x-show="show" x-on:click="editMode = !editMode">
                                    <i class="ti ti-edit"></i> Edit
                                </button>
                            </template>
                            <template x-if="editMode && show">
                                <div class="d-flex gap-2">
                                    <button class="save-question-btn btn btn-sm btn-primary" x-on:click.prevent="$refs.editForm.submit(); loader()">
                                        <i class="ti ti-device-floppy"></i> Save
                                    </button>
                                    <a class="btn btn-sm btn-warning" x-on:click="editMode = !editMode">
                                        <i class="ti ti-x"></i> Cancel
                                    </a>
                                </div>
                            </template>
                            <form action="{{ route('quizzes.destroyQuestions', $question->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="delete-question-btn btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Delete this question">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body" x-show="show" x-transition.duration.500ms>
                        <form action="{{ route('quizzes.updateQuestions', $question->id) }}" method="POST" x-ref="editForm">
                            @csrf
                            @method('PATCH')
                            <input name="number" type="hidden" value="{{ $loop->iteration }}">
                            <label class="form-label" for="oldQuestion">Soal</label>
                            <textarea class="form-control" id="oldQuestion" name="oldQuestion" x-bind:disabled="!editMode" placeholder="Tulisakan pertanyaan disini...">{{ $question->question }}</textarea>
                            <label class="form-label mt-4" for="oldExplanation">Pembahasan</label>
                            <textarea class="form-control" id="oldExplanation" name="oldExplanation" x-bind:disabled="!editMode" placeholder="Berikan pembahasan dari pertanyaan di atas...">{{ $question->answer_explanation }}</textarea>
                            <label class="form-label mt-4">Opsi Jawaban</label>
                            <div x-data="{ selectedAnswer: null }">
                                @foreach ($question->answers as $answer)
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <input class="is-valid form-check-input mt-0" name="is_correct" type="radio" value="{{ $answer->id }}" x-bind:disabled="!editMode" x-on:click="selectedAnswer = {{ $answer->id }}" {{ $answer->is_correct ? 'checked' : '' }} />
                                        </div>
                                        <input class="form-control {{ $answer->is_correct ? 'is-valid' : '' }}" name="oldAnswers[{{ $answer->id }}]" type="text" value="{{ $answer->answer }}" x-bind:disabled="!editMode" x-bind:class="{ 'is-valid': selectedAnswer == {{ $answer->id }} }" />
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        @endforeach
    @else
        <p>Belum ada pertanyaan.</p>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="addQuestionModal" aria-hidden="true" tabindex="-1">
        <form action="{{ route('quizzes.storeQuestions') }}" method="POST">
            @csrf
            <input name="quiz_id" type="hidden" value="{{ $quiz->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background: #f8f9fa">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pertanyaan</h1>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label" for="question">Soal</label>
                        <textarea class="form-control" id="question" name="question" placeholder="Tulisakan pertanyaan disini..." required>{{ old('question') }}</textarea>
                        <label class="form-label mt-4" for="explanation">Pembahasan</label>
                        <textarea class="form-control" id="explanation" name="explanation" placeholder="Berikan pembahasan dari pertanyaan di atas..." required>{{ old('explanation') }}</textarea>
                        <label class="form-label mt-4">Opsi Jawaban</label>
                        <div x-data="{ selectedAnswer: null }">
                            @if (old('answers'))
                                @foreach (old('answers') as $answer)
                                    <div class="input-group mb-3">
                                        <div class="input-group-text" id="answer_option">
                                            <input class="form-check-input is-valid" name="is_correct" type="radio" value="{{ $loop->iteration }}" x-on:click="selectedAnswer = {{ $loop->iteration }}" required>
                                        </div>
                                        <input class="answer-form form-control" name="answers[{{ $loop->iteration }}]" type="text" value="{{ $answer }}" x-bind:class="{ 'is-valid': selectedAnswer == {{ $loop->iteration }} }" required>
                                        @if ($loop->iteration > 2)
                                            <a class="delete-option btn btn-sm btn-danger d-flex align-items-center" id="delete_answer_{{ $loop->iteration }}"><i class="ti ti-trash"></i></a>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                @for ($x = 1; $x <= 4; $x++)
                                    <div class="input-group mb-3">
                                        <div class="input-group-text" id="answer_option">
                                            <input class="form-check-input is-valid" name="is_correct" type="radio" value="{{ $x }}" x-on:click="selectedAnswer = {{ $x }}" required>
                                        </div>
                                        <input class="answer-form form-control" name="answers[{{ $x }}]" type="text" x-bind:class="{ 'is-valid': selectedAnswer == {{ $x }} }" required>
                                        @if ($x > 2)
                                            <a class="delete-option btn btn-sm btn-danger d-flex align-items-center" id="delete_answer_{{ $x }}"><i class="ti ti-trash"></i></a>
                                        @endif
                                    </div>
                                @endfor
                            @endif
                            <a class="btn btn-sm btn-primary" id="add_option">
                                <i class="ti ti-plus"></i> Add Option
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer" style="background: #f8f9fa">
                        <a class="btn btn-danger" data-bs-dismiss="modal" type="button">Close</a>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let answerCount = 4;
            $('#add_option').click(function() {
                answerCount++;
                const answerInput = $('<input>')
                    .addClass('answer-form form-control')
                    .attr('type', 'text')
                    .attr('x-bind:class', `{ 'is-valid': selectedAnswer == ${answerCount} }`)
                    .attr('name', `answers[${answerCount}]`)
                    .prop('required', true);
                const correctInput = $('<input>')
                    .addClass('form-check-input is-valid')
                    .attr('name', 'is_correct')
                    .attr('type', 'radio')
                    .attr('x-on:click', `selectedAnswer = ${answerCount}`)
                    .attr('value', answerCount)
                    .prop('required', true)
                const deleteButton = $('<a>')
                    .addClass('delete-option btn btn-sm btn-danger d-flex align-items-center')
                    .attr('id', `delete_answer_${answerCount}`)
                    .append($('<i>')
                        .addClass('ti ti-trash'));
                const newInputGroup = $('<div>')
                    .addClass('input-group mb-3')
                    .append($('<div>')
                        .addClass('input-group-text')
                        .append(correctInput))
                    .append(answerInput)
                    .append(deleteButton);
                newInputGroup.hide().insertBefore('#add_option').slideDown(500);
            });
            $('.modal-body').on('click', '.delete-option', function() {
                $(this).parent().slideUp(500, function() {
                    $(this).remove();
                });
            });
        });
    </script>
@endsection
