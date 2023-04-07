$(document).ready(function () {
    // Loading animation
    function loader() {
        Swal.fire({
            showConfirmButton: false,
            allowOutsideClick: false,
            heightAuto: false,
            width: 100,
            didOpen: () => {
                Swal.showLoading()
            }
        });
    };
    $(window).on('load', function () {
        $('.loading-animation').fadeOut('slow');
        setTimeout(function () {
            $('.loading-animation').remove();
        }, 1000);
        $('.tox-statusbar__branding').remove();
        AOS.init();
    });
    $(document).on('submit', 'form', function () {
        loader();
    });

    // Image preview and drag n' drop
    const coverInput = $('#cover-input');
    const coverPreview = $('#cover-preview');
    const coverPreviewUpdate = $('#cover-preview-update');
    const coverPreviewAndUpdate = $('#cover-preview, #cover-preview-update');
    function imagePreview(files) {
        const file = files;
        const fileType = file["type"];
        const validImageTypes = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/jfif", "image/webp"];
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
            reader.onload = function (e) {
                var img = new Image();
                img.onload = function () {
                    var canvas = document.createElement("canvas");
                    canvas.width = this.width;
                    canvas.height = this.height;
                    var ctx = canvas.getContext("2d");
                    ctx.drawImage(this, 0, 0);
                    canvas.toBlob(function (blob) {
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
    coverPreviewAndUpdate.on('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        coverPreviewAndUpdate.addClass('dragging');
    });
    coverPreviewAndUpdate.on('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        coverPreviewAndUpdate.removeClass('dragging');
    });
    coverPreviewAndUpdate.on('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        const files = e.originalEvent.dataTransfer.files;
        if (files.length > 0) {
            coverInput.prop('files', files);
            imagePreview(files[0]);
        }
        coverPreviewAndUpdate.removeClass('dragging');
    });
    coverPreviewAndUpdate.click(function (e) {
        e.preventDefault();
        coverInput.click();
    });
    coverInput.change(function (e) {
        e.preventDefault();
        imagePreview(this.files[0]);
    });
});