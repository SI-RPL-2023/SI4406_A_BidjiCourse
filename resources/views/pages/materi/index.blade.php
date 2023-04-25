@extends('layouts.main')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('footer')
    @include('layouts.footer')
@endsection
@section('style')
    <style>
    </style>
@endsection
@section('main')
    <div class="container" style="padding-top: 100px">
        <h1 class="text-center">Materi</h1>
        <div class="album py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                    @foreach ($courses as $course)
                        {{-- @for ($i = 0; $i < 40; $i++) --}}
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                {{-- <img src="https://picsum.photos/640/360?random={{ $loop->iteration }}"
                                    alt=""> --}}
                                <img src="{{ $course->cover }}" alt="" style="object-fit: cover;
                                aspect-ratio: 16 / 9;">
                                <div class="card-body">
                                    <a class="text-decoration-none" href="" style="font-size: 13px">{{ $course->category->name }}</a>
                                    <h4 class="card-title">{{ $course->title }}</h4>
                                    <p class="card-text">{{ $course->desc }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="badge" style="font-size: 13px; background-color: rgb(234, 234, 234)">
                                            <span class="text-muted"><i class="ti ti-star-filled text-warning"></i>
                                                4.9</span>
                                        </div>
                                        <a class="btn btn-sm btn-dark" href="{{ route('materi.show', $course->slug) }}">Belajar Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endfor --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
