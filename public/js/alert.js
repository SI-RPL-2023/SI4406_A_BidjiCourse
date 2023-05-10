const Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showClass: {
        popup: "animate__animated animate__fadeIn",
    },
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

const swalCustom = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-primary mx-1",
        cancelButton: "btn btn-danger mx-1",
    },
    buttonsStyling: false,
});

$(document).ready(function () {
    $(".delete-user-btn").on("click", function (e) {
        e.preventDefault();
        swalCustom.fire({
            title: "Hapus User",
            html: "Apakah kamu yakin ingin menghapus user ini?",
            icon: "warning",
            showCancelButton: true,
            
            
            confirmButtonText: "Hapus",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.value) {
                $(this).closest("form").submit();
            }
        });
    });

    $(".delete-question-btn").on("click", function (e) {
        e.preventDefault();
        swalCustom.fire({
            title: "Hapus Pertanyaan",
            html: "Apakah kamu yakin ingin menghapus pertanyaan ini?",
            icon: "warning",
            showCancelButton: true,
            
            
            confirmButtonText: "Hapus",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.value) {
                $(this).closest("form").submit();
            }
        });
    });

    $(".delete-course-btn").on("click", function (e) {
        e.preventDefault();
        swalCustom.fire({
            title: "Hapus Course",
            html: "Apakah kamu yakin ingin menghapus course ini? Semua <strong>quiz</strong> yang berhubungan dengan course ini juga akan <strong>terhapus</strong>.",
            icon: "question",
            showCancelButton: true,
            
            
            confirmButtonText: "Hapus",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.value) {
                swalCustom.fire({
                    title: "Last Confirmation",
                    html: "Apakah kamu benar-benar yakin? Semua yang terhapus <strong>tidak akan bisa dikembalikan lagi</strong>.",
                    icon: "warning",
                    showCancelButton: true,
                    
                    
                    confirmButtonText: "Ya, Saya Yakin",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.value) {
                        $(this).closest("form").submit();
                    }
                });
            }
        });
    });

    $(".delete-category-btn").on("click", function (e) {
        e.preventDefault();
        swalCustom.fire({
            title: "Hapus Category",
            html: "Apakah kamu yakin ingin menghapus category ini? Semua <strong>course</strong> yang berhubungan dengan category ini juga akan <strong>terhapus</strong>.",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.value) {
                swalCustom.fire({
                    title: "Last Confirmation",
                    html: "Apakah kamu benar-benar yakin? Semua yang terhapus <strong>tidak akan bisa dikembalikan lagi</strong>.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Saya Yakin",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.value) {
                        $(this).closest("form").submit();
                    }
                });
            }
        });
    });

    $(".delete-quiz-btn").on("click", function (e) {
        e.preventDefault();
        swalCustom.fire({
            title: "Hapus Quiz",
            html: "Apakah kamu yakin ingin menghapus quiz ini? Semua <strong>pertanyaan dan jawaban</strong> yang berhubungan dengan quiz ini juga akan <strong>terhapus</strong>.",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.value) {
                swalCustom.fire({
                    title: "Last Confirmation",
                    html: "Apakah kamu benar-benar yakin? Semua yang terhapus <strong>tidak akan bisa dikembalikan lagi</strong>.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Saya Yakin",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.value) {
                        $(this).closest("form").submit();
                    }
                });
            }
        });
    });
});
