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
  <div class="container">
    <h1 class="text-center">Materi</h1>
    <form id="filterForm" action="{{ route('materi.index') }}" method="GET" x-data x-ref="filterForm">
      <div class="row justify-content-center d-flex mt-3">
        <div class="col-auto">
          <div class="input-group">
            <input class="form-control" id="searchBar" name="search" type="search" value="{{ request('search') }}" autocomplete="off" placeholder="Cari materi disini..." required>
            <button class="input-group-text text-dark" type="submit">
              <i class="ti ti-search"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="row g-2 justify-content-center d-flex mt-2">
        <div class="col-md-3">
          <div class="input-group mb-3">
            <label class="input-group-text gap-2" for="category">
              <i class="ti ti-category"></i> Category
            </label>
            <select class="form-select" id="category" name="category" x-on:change="$refs.filterForm.submit(); loader()">
              <option value>Semua</option>
              @foreach ($categories as $category)
                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : null }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="input-group mb-3">
            <label class="input-group-text gap-2" for="sort">
              <i class="ti ti-arrows-sort"></i> Sort
            </label>
            <select class="form-select" id="sort" name="sort" x-on:change="$refs.filterForm.submit(); loader()">
              <option value>Default</option>
              <option value="title" {{ request('sort') == 'title' ? 'selected' : null }}>Title</option>
              <option value="new" {{ request('sort') == 'new' ? 'selected' : null }}>Terbaru</option>
              <option value="old" {{ request('sort') == 'old' ? 'selected' : null }}>Terlama</option>
            </select>
          </div>
        </div>
        @if (request('category') || request('search'))
          <div class="col-auto">
            <a class="btn btn-danger text-decoration-none" href="{{ route('materi.index') }}" onclick="loader()">
              <i class="ti ti-reload"></i> Reset
            </a>
          </div>
        @endif
      </div>
      @if ((request('category') || request('search')) && !$courses->isEmpty())
        <div class="mt-3 text-center">
          <h5>{{ $courses->total() }} materi ditemukan</h5>
        </div>
      @endif
    </form>
    @if ($courses->isEmpty())
      <div class="row text-center">
        <div class="col">
          <img class="img-fluid mb-3" src="/img/assets/not-found.png" alt="no bookmark" style="width: auto; height: 400px">
          <h2>Hasil pencarianmu tidak ditemukan :(</h2>
          <p>Reset filter dan gunakan kata kunci lain.</p>
        </div>
      </div>
    @else
      <div class="album py-3">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach ($courses as $course)
              @php
                $favorited = auth()
                    ->user()
                    ->favorites()
                    ->where('course_id', $course->id)
                    ->where('user_id', auth()->user()->id)
                    ->where('favorited', true)
                    ->exists();
              @endphp
              <div class="col">
                <div class="card h-100 shadow-sm" x-data="{ favorite: {{ $favorited ? 'true' : 'false' }}, show: false }">
                  <img class="rounded-top" src="{{ $course->cover }}" alt="{{ $course->title }}" style="object-fit: cover;
                                aspect-ratio: 16 / 9;" x-on:mouseenter="show = true" x-on:mouseleave="show = false">
                  <div class="favorite-button shadow" data-course-title="{{ $course->title }}" data-course-slug="{{ $course->slug }}" data-bs-toggle="tooltip" data-bs-title="Simpan atau hapus favorite" x-show="show" x-on:click="favorite = !favorite" x-on:mouseenter="show = true" x-on:mouseleave="show = false" x-transition.duration.500ms>
                    <i class="ti text-{{ $favorited ? 'warning' : 'black' }} ti-bookmark{{ $favorited ? '-filled' : '' }} fs-5"></i>
                  </div>
                  <div class="card-body">
                    <a class="text-decoration-none" href="{{ route('materi.index', ['category' => $course->category->slug]) }}" style="font-size: 13px">{{ $course->category->name }}</a>
                    <h4 class="card-title d-flex align-items-center gap-2">
                      {{ $course->title }}
                      @if ($course->quiz && $course->quiz->status == 'Published')
                        <span class="badge bg-success" data-bs-toggle="tooltip" data-bs-title="Ada quiz pada materi ini" style="font-size: 11px; cursor: help;">Quiz</span>
                      @endif
                    </h4>
                    <p class="card-text">{{ $course->desc }}</p>
                  </div>
                  <div class="card-footer border-0 bg-white">
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
      <div class="mt-4">
        {{ $courses->links() }}
      </div>
    @endif
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      });
      $('.favorite-button').click(function() {
        const courseTitle = $(this).data('course-title');
        const courseSlug = $(this).data('course-slug');
        const favoriteButton = $(this);
        const icon = $(this).html();
        $(this).html('<span class="spinner-border spinner-border-sm"></span>');
        $.ajax({
          url: `{{ route('favorites.store', [], false) }}`,
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
          },
          error: function(error) {
            console.error(error);
            favoriteButton.html(icon);
            Toast.fire({
              icon: 'error',
              text: 'Request failed, please refresh the page and try again.',
            })
          }
        });
      });
    });
  </script>
@endsection
