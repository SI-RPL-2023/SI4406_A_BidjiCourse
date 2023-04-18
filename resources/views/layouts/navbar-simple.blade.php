<nav
    class="navbar navbar-v3-2 bg-white default-layout-navbar navbar-expand-lg navbar-light d-flex flex-row fixed-top-sm fixed-top shadow">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route($route) }}">
            <i class="ti ti-arrow-narrow-left fs-2"></i>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto">
                <div class="fs-5">{{ $title }}</div>
            </ul>
            <ul class="navbar-nav ms-auto">
                <i class="ti ti-user-circle fs-1"></i>
            </ul>
        </div>
    </div>
</nav>
