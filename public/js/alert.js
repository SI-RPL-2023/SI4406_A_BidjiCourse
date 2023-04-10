$(document).ready(function () {
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
});