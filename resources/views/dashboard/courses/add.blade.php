@extends('dashboard.layouts.main')


@section('head-script')
    <!-- Text Editor -->
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script> --}}
    <script src="https://cdn.tiny.cloud/1/u5yv80sn31alf3o4asjhm5d8zpe5dgof1hastir594bi2xes/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection


@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>Add Courses</h3>
        <a href="{{ route('courses.index') }}" class="btn btn-sm btn-danger">
            <i class="ti ti-arrow-back-up"></i> Back
        </a>
    </div>
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mt-2">
            <label for="title" class="form-label">Title</label>
            <input value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                name="title" id="title" placeholder="Course apa yang ingin anda tambahkan?" required_d autofocus>
        </div>
        @error('title')
            <div class="text-danger text-start" style="font-size: 14px">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-4">
            <label class="form-label">Slug</label>
            <input value="{{ old('slug') }}" type="text" class="form-control @error('slug') is-invalid @enderror"
                name="slug" id="slug" placeholder="Slug akan terisi otomatis sesuai judul course yang anda masukan."
                readonly>
        </div>
        @error('slug')
            <div class="text-danger text-start" style="font-size: 14px">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-4">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc"
                placeholder="Apa yang akan dipelajari di course ini?" required_d>{{ old('desc') }}</textarea>
        </div>
        @error('desc')
            <div class="text-danger text-start" style="font-size: 14px">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-4">
            <label for="cover" class="form-label">Cover</label>
            <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" id="cover"
                accept="cover/*" required_d>
        </div>
        @error('cover')
            <div class="text-danger text-start" style="font-size: 14px">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-4">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="tinymce">{{ old('body') }}</textarea>
        </div>
        @error('body')
            <div class="text-danger text-start" style="font-size: 14px">
                {{ $message }}
            </div>
        @enderror


        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mt-5" type="submit">Tambah Course</button>
        </div>

    </form>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: '#tinymce',
                height: 500,
                plugins: 'fullscreen anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes autocorrect typography inlinecss preview insertdatetime',
                toolbar: 'fullscreen undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                file_picker_types: 'image media',
                image_caption: true,
                file_picker_callback: function(cb, value, meta) {
                    const input = $('<input/>')
                        .attr('type', 'file')
                        .attr('accept', 'image/*')
                        .on('change', function(e) {
                            const file = e.target.files[0];
                            const reader = new FileReader();
                            reader.onload = function() {
                                const id = 'blobid' + (new Date()).getTime();
                                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                                const base64 = reader.result.split(',')[1];
                                const blobInfo = blobCache.create(id, file, base64);
                                blobCache.add(blobInfo);
                                cb(blobInfo.blobUri(), {
                                    title: file.name
                                });
                            };
                            reader.readAsDataURL(file);
                        });
                    input.trigger('click');
                },
                tinycomments_mode: 'embedded',
                tinycomments_author: '{{ auth()->user()->full_name }}',
            });

            $('#title').on('change', function() {
                const title = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/dashboard/courses/getSlug?title=' + title,
                    success: function(response) {
                        $('#slug').val(response);
                    }
                });
            });
        });
    </script>
@endsection
