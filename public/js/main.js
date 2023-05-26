// NProgress.configure({
//     showSpinner: false,
// });

NProgress.start();

const progress = setInterval(() => {
    NProgress.inc();
}, 1000);

AOS.init();

// Loading animation
function loader(text = "Loading...", width = 150) {
    Swal.fire({
        showConfirmButton: false,
        allowOutsideClick: false,
        heightAuto: false,
        width: width,
        didOpen: () => {
            Swal.showLoading();
        },
        text: text,
    });
}

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

    // Trigger bootstrap tooltip
    const tooltipTriggerList = $('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );
});

$(window).on("load", function () {
    clearInterval(progress);
    NProgress.done();
});
