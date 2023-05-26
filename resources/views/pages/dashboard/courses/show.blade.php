@extends('pages.dashboard.layouts.main')
@section('style')
    <style>
        #course-cover {
            max-width: 70%;
            width: 70%;
            height: auto;
            object-fit: cover;
            aspect-ratio: 16 / 9;
        }

        @media (max-width: 767.98px) {
            #course-cover {
                max-width: 100%;
                width: 100%;
            }
        }
    </style>
@endsection
@section('main')
    <div class="border-bottom mb-3 pt-3 pb-2">
        <h1>{{ $course->title }}</h1>
        <div class="d-grid d-flex mt-3 mb-2 gap-2">
            <a class="btn btn-sm btn-warning" href="{{ route('courses.index') }}">
                <i class="ti ti-arrow-back-up"></i> Back
            </a>
            <a class="btn btn-sm btn-primary" href="{{ route('courses.edit', $course->slug) }}">
                <i class="ti ti-edit"></i> Edit
            </a>
            <form action="{{ route('courses.destroy', $course->slug) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger delete-course-btn" id="delete">
                    <i class="ti ti-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img class="img-fluid mb-4 mt-2 rounded" id="course-cover" src="{{ $course->cover }}" alt="{{ $course->title }}"><br>
                {!! $course->body !!}
            </div>
        </div>
    </div>
@endsection
