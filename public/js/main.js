AOS.init();

// Loading animation
function loader() {
    Swal.fire({
        showConfirmButton: false,
        allowOutsideClick: false,
        heightAuto: false,
        width: 150,
        didOpen: () => {
            Swal.showLoading();
        },
        text: "Loading...",
    });
}
// loader();

// Wait for Element function
function waitForElm(selector) {
    return new Promise((resolve) => {
        if (document.querySelector(selector)) {
            return resolve(document.querySelector(selector));
        }
        const observer = new MutationObserver((mutations) => {
            if (document.querySelector(selector)) {
                resolve(document.querySelector(selector));
                observer.disconnect();
            }
        });
        observer.observe(document.body, {
            childList: true,
            subtree: true,
        });
    });
}

$(document).ready(function () {
    setTimeout(function () {
        $("main").removeAttr("data-aos data-aos-duration");
    }, 500);
    $(document).on("submit", "form", function () {
        loader();
    });

    // Tooltip
    const tooltipTriggerList = $('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );
});

// $(window).on("load", function () {
//     $(".loading-animation").fadeOut("slow");
//     Swal.close();
//     setTimeout(function () {
//         $(".loading-animation").remove();
//         $("main").removeAttr("data-aos data-aos-duration");
//     }, 500);
// });
