@extends('layouts.main')
@section('navbar')
    @include('layouts.navbar-simple', ['route' => 'materi.index', 'title' => $course->title , 'category' => $course->category->name])
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
                {!! $course->body !!}
            </div>
        </div>
    </div>
@endsection
