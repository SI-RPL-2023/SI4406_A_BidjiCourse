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
        <h3>{{ isset($quiz) ? 'Edit' : 'Add' }} Quiz</h3>
        <div class="d-grid d-flex gap-2">
            <a class="btn btn-sm btn-warning" href="{{ route('quizzes.index') }}">
                <i class="ti ti-arrow-back-up"></i> Back
            </a>
        </div>
    </div>
    <form action="{{ route(isset($quiz) ? 'quizzes.update' : 'quizzes.store', isset($quiz) ? $quiz->id : '') }}" method="POST">
        @if (isset($quiz))
            @method('PATCH')
        @endif
        @csrf
        <div class="mt-2">
            <label class="form-label" for="name">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name', isset($quiz) ? $quiz->name : '') }}" placeholder="Tuliskan nama quiz, disarankan tidak jauh dengan judul course yang akan dipilih." required autofocus>
        </div>
        @error('name')
            <div class="text-danger error-message text-start">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <?php $x = 0; ?>
            <label class="form-label">Course</label>
            <select class="form-select" id="course" name="course_id" required>
                @if (isset($quiz))
                    <option value="{{ $quiz->course->id }}" selected>
                        {{ $quiz->course->category->name }} - {{ $quiz->course->title }}
                    </option>
                @else
                    <option selected>Pilih course...</option>
                @endif
                @foreach ($courses as $course)
                    @if ($course->quiz)
                        @continue
                    @else
                        <?php $x++; ?>
                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : (isset($quiz) && $quiz->course->id == $course->id ? 'selected' : '') }}>
                            {{ $course->category->name }} - {{ $course->title }}
                        </option>
                    @endif
                @endforeach
                @if ($x == 0)
                    <option>Tidak ada course yang belum memiliki quiz, silahkan tambahkan course baru untuk menambah quiz</option>
                @endif
            </select>
        </div>
        @error('course_id')
            <div class="text-danger error-message text-start">
                {{ $message }}
            </div>
        @enderror
        @php
            $time_minutes = isset($quiz) && $quiz->time_limit ? floor(($quiz->time_limit % 3600) / 60) : null;
            $time_hours = isset($quiz) && $quiz->time_limit ? floor($quiz->time_limit / 3600) : null;
        @endphp
        <div class="mt-4" x-data="{ timeSwitch: {{ isset($quiz) ? ($quiz->time_limit ? 'true' : 'false') : 'false' }} }">
            <div class="d-flex">
                <div class="form-check form-switch">
                    <input class="form-check-input" id="time_switches" name="time_switches" type="checkbox" role="switch" x-model="timeSwitch">
                </div>
                <label class="form-label" for="name">Time Limit</label>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="input-group">
                        <input class="form-control" id="time_minutes" name="time_minutes" type="number" value="{{ old('time_minutes', $time_minutes) }}" x-bind:disabled="!timeSwitch">
                        <span class="input-group-text">Menit</span>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <input class="form-control" id="time_hours" name="time_hours" type="number" value="{{ old('time_hours', $time_hours) }}" x-bind:disabled="!timeSwitch">
                        <span class="input-group-text">Jam</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid d-flex justify-content-end mt-5 gap-2">
            <button class="btn btn-primary" id="update-btn" name="submit" type="submit" value="done">{{ isset($quiz) ? 'Update' : 'Tambah' }} Quiz</button>
            <button class="btn btn-warning" id="draft-btn" name="submit" type="submit" value="draft">Simpan
                Draft</button>
            <a class="btn btn-danger" href="{{ route('quizzes.index') }}">Cancel</a>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#time_minutes').on('input', function() {
                if (parseInt($(this).val()) <= 0) {
                    $(this).val(null);
                } else if (parseInt($(this).val()) > 59) {
                    $(this).val(null);
                    document.querySelector('#time_hours').stepUp(1);
                }
            });
            $('#time_hours').on('input', function() {
                if (parseInt($(this).val()) <= 0) {
                    $(this).val(null);
                }
            });
        });
    </script>
@endsection
