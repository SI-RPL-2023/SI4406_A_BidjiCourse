const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

$(document).ready(function () {
    $('.delete-course-btn').on('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Hapus Course',
            html: 'Apakah kamu yakin ingin menghapus course ini?',
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
    $('.delete-user-btn').on('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Hapus User',
            html: 'Apakah kamu yakin ingin menghapus user ini?',
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