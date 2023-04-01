@extends('dashboard.layouts.main')
@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>Add Courses</h3>
        <a href="{{ route('courses.index') }}" class="btn btn-sm btn-danger">
            <i class="ti ti-arrow-back-up"></i> Back
        </a>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input value="{{ old('title') }}" type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="mb-5" name="jodit" id="jodit"></textarea>
        </div>
        {{-- <div class="mb-3">
            <label for="image" class="form-label">Pilih file</label>
            <input value="{{ old('image') }}" type="file" class="form-control" name="image" id="image"
                accept="image/*" required>
        </div> --}}
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mb-5" type="submit" name="submit">Submit</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            const jodit = Jodit.make('#jodit', {
                allowResizeY: true,
                height: 400,
                removeButtons: 'about',
            });
            $(".jodit-placeholder").text("Tambahkan materi di sini...");
            $(".jodit-status-bar-link").remove();
        })
    </script>
@endsection
