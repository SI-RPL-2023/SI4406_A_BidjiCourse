@extends('layouts.main')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('footer')
    @include('layouts.footer')
@endsection
@section('style')
    <style>
        .favorite-button {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 35px;
            height: 35px;
            border-radius: 100%;
            background-color: rgba(255, 255, 255, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
    </style>
@endsection
@section('main')
    <div class="container" >
        @if ($courses->isEmpty())
            <div class="row text-center">
                <div class="col">
                    <img class="img-fluid mb-3" src="/img/assets/bookmark.png" alt="no bookmark" style="width: auto; height: 400px">
                    <h2>Yah, materi favoritmu kosong nih :(</h2>
                    <p>Jika kamu menemukan materi yang kamu suka, klik icon bookmark. Materi tesebut nanti akan muncul di sini.</p>
                </div>
            </div>
        @else
            <h1 class="text-center">Materi Kesukaanmu</h1>
            <div class="album py-5">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                        @foreach ($courses as $course)
                            <div class="col">
                                <div class="card h-100 shadow-sm" x-data="{ favorite: true, show: false }">
                                    <img class="rounded-top" src="{{ $course->cover }}" alt="{{ $course->title }}" style="object-fit: cover;
                                aspect-ratio: 16 / 9;" x-on:mouseenter="show = true" x-on:mouseleave="show = false">
                                    <div class="favorite-button shadow" data-course-title="{{ $course->title }}" data-course-slug="{{ $course->slug }}" data-bs-toggle="tooltip" data-bs-title="Hapus dari favorite" x-show="show" x-on:click="favorite = !favorite" x-on:mouseenter="show = true" x-on:mouseleave="show = false" x-transition.duration.500ms>
                                        <i class="ti text-warning ti-bookmark-filled fs-5"></i>
                                    </div>
                                    <div class="card-body">
                                        <a class="text-decoration-none" href="" style="font-size: 13px">{{ $course->category->name }}</a>
                                        <h4 class="card-title d-flex align-items-center gap-2">
                                            {{ $course->title }}
                                            @if ($course->quiz && $course->quiz->status == 'Published')
                                                <span class="badge bg-success" style="font-size: 11px">Quiz</span>
                                            @endif
                                        </h4>
                                        <p class="card-text">{{ $course->desc }}</p>
                                    </div>
                                    <div class="card-footer mb-2 border-0 bg-white">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="badge" style="font-size: 13px; background-color: rgb(234, 234, 234)">
                                                <span class="text-muted">
                                                    <i class="ti ti-bookmark-filled text-warning"></i>
                                                    <span class="favorite-count">{{ $course->favorite }}</span>
                                                </span>
                                            </div>
                                            <a class="btn btn-sm btn-dark" href="{{ route('materi.show', $course->slug) }}">Belajar Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mt-0">
                {{ $courses->links() }}
            </div>
        @endif
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let favoriteCourses = {{ $courses->count() }};
            $('.favorite-button').click(function() {
                const courseTitle = $(this).data('course-title');
                const courseSlug = $(this).data('course-slug');
                const favoriteButton = $(`.favorite-button[data-course-slug=${courseSlug}]`)
                const icon = $(this).html();
                $(this).html('<span class="spinner-border spinner-border-sm"></span>');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `{{ route('favorites.store') }}`,
                    type: 'POST',
                    data: {
                        course_slug: courseSlug
                    },
                    success: function(response) {
                        console.log(response);
                        favoriteButton.html(response['icon']);
                        favoriteButton.parent().find('span.favorite-count').text(response['count']);
                        Toast.fire({
                            icon: response['toast'],
                            text: response['message']
                        });
                        favoriteCourses--;
                        if (favoriteCourses == 0) {
                            favoriteButton.parent().parent().animate({
                                opacity: 0
                            }, 500);
                            location.reload();
                        } else {
                            favoriteButton.parent().parent().fadeOut();
                        }
                    },
                    error: function(error) {
                        console.error(error);
                        favoriteButton.html(icon);
                        Toast.fire({
                            icon: 'error',
                            text: 'Gagal menambahkan course ke favorite.',
                        });
                    }
                });
            });
        });
    </script>
@endsection
