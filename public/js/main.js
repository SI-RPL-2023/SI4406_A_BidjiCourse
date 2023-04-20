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

$(window).on("load", function () {
    $(".loading-animation").fadeOut("slow");
    AOS.init();
    setTimeout(function () {
        $(".loading-animation").remove();
        $("main").removeAttr("data-aos data-aos-duration");
    }, 1000);
});

$(document).ready(function () {
    // Loading animation
    function loader() {
        Swal.fire({
            showConfirmButton: false,
            allowOutsideClick: false,
            heightAuto: false,
            width: 100,
            didOpen: () => {
                Swal.showLoading();
            },
        });
    }
    $(document).on("submit", "form", function () {
        loader();
    });

    // Tooltip
    const tooltipTriggerList = $('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );
});
