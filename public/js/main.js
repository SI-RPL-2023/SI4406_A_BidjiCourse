$('.delete-course-btn').on('click', function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Hapus Course',
        html: 'Apakah anda yakin ingin menghapus course ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#0d6efd',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.value) {
            $(this).closest('form').submit();
        }
    })
});


$('#cover-preview, #cover-preview-update').click(function (e) {
    e.preventDefault();
    $('#cover-input').click();
});
$('#cover-input').change(function (e) {
    e.preventDefault();
    const file = this.files[0];
    const fileType = file["type"];
    const validImageTypes = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/jfif", "image/webp"];
    const old_src = $('#cover-preview-update').attr('old-src');
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
        $('#cover-preview').attr('src', '/img/assets/cover-placeholder.png');
        $('#cover-preview-update').attr('src', old_src);
        $('#cover-input').val('')
        Swal.fire({
            icon: 'warning',
            html: 'Ekstensi file yang didukung: ' + invalidTypeText,
            confirmButtonColor: '#0d6efd',
        })
    } else if (file.size > 5242880) {
        $('#cover-preview').attr('src', '/img/assets/cover-placeholder.png');
        $('#cover-preview-update').attr('src', old_src);
        $('#cover-input').val('')
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
                    $('#cover-preview').attr('src', url);
                    $('#cover-preview-update').attr('src', url);
                });
            };
            img.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});