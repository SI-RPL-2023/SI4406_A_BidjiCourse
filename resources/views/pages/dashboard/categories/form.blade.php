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
        <h3>{{ isset($category) ? 'Edit' : 'Add' }} Category</h3>
        <div class="d-grid d-flex gap-2">
            <a class="btn btn-sm btn-warning" href="{{ route('categories.index') }}">
                <i class="ti ti-arrow-back-up"></i> Back
            </a>
        </div>
    </div>
    <form action="{{ route(isset($category) ? 'categories.update' : 'categories.store', isset($category) ? $category->id : '') }}" method="POST">
        @if (isset($category))
            @method('PATCH')
        @endif
        @csrf
        <div class="mt-2">
            <label class="form-label" for="name">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name', isset($category) ? $category->name : '') }}" placeholder="Mata pelajaran apa yang ingin kamu tambahkan?" required autofocus>
        </div>
        @error('name')
            <div class="text-danger error-message text-start">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <label class="form-label">Slug</label>
            <input class="form-control @error('slug') is-invalid @enderror" id="slug" type="text" value="{{ Illuminate\Support\Str::slug(old('name', isset($category) ? $category->name : '')) }}" placeholder="Slug akan terisi otomatis sesuai nama mata pelajaran yang kamu masukan." disabled>
        </div>
        @error('slug')
            <div class="text-danger error-message text-start">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-4">
            <label class="form-label" for="code">Code</label>
            <input class="form-control @error('code') is-invalid @enderror" id="code" name="code" type="text" value="{{ old('code', isset($category) ? $category->code : '') }}" placeholder="Kode mata pelajaran. Contoh: MTK" required autofocus>
        </div>
        @error('code')
            <div class="text-danger error-message text-start">
                {{ $message }}
            </div>
        @enderror
        <div class="d-grid d-flex justify-content-end mt-3 gap-2">
            <button class="btn btn-primary" id="update-btn" name="submit" type="submit">{{ isset($category) ? 'Update' : 'Tambah' }} Category</button>
            <a class="btn btn-danger" href="{{ route('categories.index') }}">Cancel</a>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let delayTimer;
            $('#name').on('keyup', function() {
                clearTimeout(delayTimer);
                delayTimer = setTimeout(() => {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        data: {
                            string: $(this).val()
                        },
                        url: `{{ route('getSlug', [], false) }}`,
                        success: function(response) {
                            $('#slug').val(response);
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                }, 500);
            });
        });
    </script>
@endsection
