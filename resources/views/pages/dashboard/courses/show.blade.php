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
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ $course->title }}</h1>
        <div class="d-grid gap-2 d-flex mt-3 mb-2">
            <a href="{{ route('courses.index') }}" class="btn btn-sm btn-warning">
                <i class="ti ti-arrow-back-up"></i> Back
            </a>
            <a href="{{ route('courses.edit', $course->slug) }}" class="btn btn-sm btn-primary">
                <i class="ti ti-edit"></i> Edit
            </a>
            <form action="{{ route('courses.destroy', $course->slug) }}" method="post">
                @csrf
                @method('delete')
                <button id="delete" class="btn btn-sm btn-danger delete-course-btn">
                    <i class="ti ti-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img id="course-cover" class="mb-4 mt-2 rounded img-fluid" src="{{ $course->cover }}"
                alt="{{ $course->title }}">
                {!! $course->body !!}
            </div>
        </div>
    </div>
@endsection
