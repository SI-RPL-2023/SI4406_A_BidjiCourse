@extends('pages.dashboard.layouts.main')
@section('head-script')
    <!-- Text Editor -->
    <script src="https://cdn.tiny.cloud/1/u5yv80sn31alf3o4asjhm5d8zpe5dgof1hastir594bi2xes/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('style')
    <style>
        #cover-preview,
        #cover-preview-update {
            max-width: 60%;
            width: 60%;
            height: auto;
            object-fit: cover;
            aspect-ratio: 16 / 9;
            cursor: pointer;
        }

        #cover-preview.dragging,
        #cover-preview-update.dragging {
            background-color: #0c9ce9;
        }

        @media (max-width: 767.98px) {

            #cover-preview,
            #cover-preview-update {
                max-width: 100%;
                width: 100%;
            }
        }
    </style>
@endsection
@section('main')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
        <h3>{{ isset($course) ? 'Edit' : 'Add' }} Courses</h3>
        <div class="d-grid d-flex gap-2">
            <a class="btn btn-sm btn-warning" href="{{ route('courses.index') }}">
                <i class="ti ti-arrow-back-up"></i> Back
            </a>
            @if (isset($course))
                <a class="btn btn-sm btn-primary" href="{{ route('courses.show', $course->slug) }}">
                    <i class="ti ti-eye"></i> Preview
                </a>
                <form action="{{ route('courses.destroy', $course->slug) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger delete-course-btn" id="delete">
                        <i class="ti ti-trash"></i> Delete
                    </button>
                </form>
            @endif
        </div>
    </div>
    <form action="{{ route(isset($course) ? 'courses.update' : 'courses.store', isset($course) ? $course->slug : '') }}" method="POST" enctype="multipart/form-data">
        @if (isset($course))
            @method('PUT')
        @endif

        @csrf

        <div class="mt-2">
            <label class="form-label" for="title">Title</label>
            <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text" value="{{ old('title', isset($course) ? $course->title : '') }}" placeholder="Course apa yang ingin anda tambahkan?" required autofocus>
        </div>
        @error('title')
            <div class="text-danger text-start" style="font-size: 14px">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-4">
            <label class="form-label">Slug</label>
            <input class="form-control @error('slug') is-invalid @enderror" id="slug" type="text" value="{{ old('slug', isset($course) ? $course->slug : '') }}" placeholder="Slug akan terisi otomatis sesuai judul course yang anda masukan." disabled>
            <input id="slug-hidden" name="slug" type="hidden" value="{{ old('slug', isset($course) ? $course->slug : '') }}">
        </div>
        @error('slug')
            <div class="text-danger text-start" style="font-size: 14px">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-4">
            <label class="form-label" for="desc">Description</label>
            <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" rows="8" placeholder="Apa yang akan dipelajari di course ini?" required>{{ old('desc', isset($course) ? $course->desc : '') }}</textarea>
        </div>
        @error('desc')
            <div class="text-danger text-start" style="font-size: 14px">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-4">
            <label class="form-label d-block" for="cover">Cover</label>
            <img class="img-thumbnail img-fluid mb-2" id="cover-preview{{ isset($course) ? '-update' : '' }}" src="{{ isset($course) ? $course->cover : '/img/assets/drag-drop-upload.png' }}" alt="cover {{ isset($course) ? 'preview' : '' }}" old-src="{{ isset($course) ? $course->cover : '' }}">
            <p> Ukuran file maksimal <span class="badge text-bg-dark">5Mb</span>
                dan format gambar yang didukung:
                <span class="badge text-bg-primary">PNG</span>
                <span class="badge text-bg-secondary">JPG</span>
                <span class="badge text-bg-success">JPEG</span>
                <span class="badge text-bg-danger">GIF</span>
                <span class="badge text-bg-warning">JFIF</span>
                <span class="badge text-bg-info">WEBP</span>
            </p>
            @error('cover')
                <div class="text-danger text-start" style="font-size: 14px">
                    {{ $message }}
                </div>
            @enderror
            <input class="d-none form-control @error('cover') is-invalid @enderror" id="cover-input" id="cover" name="cover" type="file" accept="image/*">
        </div>

        <div class="mt-4">
            <label class="form-label" for="body">Body</label>
            <textarea id="tinymce" name="body">{{ old('body', isset($course) ? $course->body : '') }}</textarea>
        </div>
        @error('body')
            <div class="text-danger text-start" style="font-size: 14px">
                {{ $message }}
            </div>
        @enderror

        <div class="d-grid d-flex justify-content-end mt-3 gap-2">
            <button class="btn btn-primary" id="update-btn" name="submit" type="submit" value="done">{{ isset($course) ? 'Update' : 'Tambah' }}
                Course</button>
            <button class="btn btn-warning" id="draft-btn" name="submit" type="submit" value="draft">Simpan
                Draft</button>
            <a class="btn btn-danger" href="{{ route('courses.index') }}">Cancel</a>
        </div>

    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: '#tinymce',
                height: 700,
                plugins: 'fullscreen preview anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'fullscreen preview undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
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
            });
            $('#title').on('change', function() {
                const title = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('getSlug') }}?title=' + title,
                    success: function(response) {
                        $('#slug').val(response);
                        $('#slug-hidden').val(response);
                    }
                });
            });

            // Image preview and drag n' drop
            const coverInput = $('#cover-input');
            const coverPreview = $('#cover-preview');
            const coverPreviewUpdate = $('#cover-preview-update');
            const coverPreviewAndUpdate = $('#cover-preview, #cover-preview-update');

            function imagePreview(files) {
                const file = files;
                const fileType = file["type"];
                const validImageTypes = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/jfif",
                    "image/webp"
                ];
                const placeholder_src = '/img/assets/drag-drop-upload.png';
                const old_src = coverPreviewUpdate.attr('old-src');
                const invalidTypeText = '<br>' +
                    '<div class="d-flex d-grid gap-2 mt-2 justify-content-center">' +
                    '<span class="badge text-bg-primary">PNG</span>' +
                    '<span class="badge text-bg-secondary">JPG</span>' +
                    '<span class="badge text-bg-success">JPEG</span>' +
                    '<span class="badge text-bg-danger">GIF</span>' +
                    '<span class="badge text-bg-warning">JFIF</span>' +
                    '<span class="badge text-bg-info">WEBP</span>' +
                    '</div>'
                const invalidSizeText = '<span class="badge text-bg-dark">5Mb</span>'
                if ($.inArray(fileType, validImageTypes) < 0) {
                    coverPreview.attr('src', placeholder_src);
                    coverPreviewUpdate.attr('src', old_src);
                    coverInput.val('')
                    Swal.fire({
                        icon: 'warning',
                        html: 'Ekstensi file yang didukung: ' + invalidTypeText,
                        confirmButtonColor: '#0d6efd',
                    })
                } else if (file.size > 5242880) {
                    coverPreview.attr('src', placeholder_src);
                    coverPreviewUpdate.attr('src', old_src);
                    coverInput.val('')
                    Swal.fire({
                        icon: 'warning',
                        html: 'Ukuran file maksimal ' + invalidSizeText,
                        confirmButtonColor: '#0d6efd',
                    })
                } else {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        var img = new Image();
                        img.onload = function() {
                            var canvas = document.createElement("canvas");
                            canvas.width = this.width;
                            canvas.height = this.height;
                            var ctx = canvas.getContext("2d");
                            ctx.drawImage(this, 0, 0);
                            canvas.toBlob(function(blob) {
                                var url = URL.createObjectURL(blob);
                                coverPreview.attr('src', url);
                                coverPreviewUpdate.attr('src', url);
                            });
                        };
                        img.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            };
            coverPreviewAndUpdate.on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                coverPreviewAndUpdate.addClass('dragging');
            });
            coverPreviewAndUpdate.on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                coverPreviewAndUpdate.removeClass('dragging');
            });
            coverPreviewAndUpdate.on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const files = e.originalEvent.dataTransfer.files;
                if (files.length > 0) {
                    coverInput.prop('files', files);
                    imagePreview(files[0]);
                }
                coverPreviewAndUpdate.removeClass('dragging');
            });
            coverPreviewAndUpdate.click(function(e) {
                e.preventDefault();
                coverInput.click();
            });
            coverInput.change(function(e) {
                e.preventDefault();
                imagePreview(this.files[0]);
            });

            // TinyMCE watermark remover
            waitForElm('.tox-statusbar__branding').then((elm) => {
                $('.tox-statusbar__branding').remove();
            });
        });
    </script>
@endsection
