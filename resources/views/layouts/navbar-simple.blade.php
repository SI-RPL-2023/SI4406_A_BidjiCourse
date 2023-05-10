<nav
    class="navbar navbar-expand navbar-light bg-white d-flex flex-row fixed-top shadow-sm">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ $route }}">
            <i class="ti ti-arrow-narrow-left fs-2"></i>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto d-block text-center">
                <a class="text-decoration-none" href="" style="font-size: 13px">{{ $category }}</a>
                <div class="fs-5">{{ $title }}</div>
            </ul>
            <ul class="navbar-nav ms-auto">
                <x-widget.profile-dropdown></x-widget.profile-dropdown>
            </ul>
        </div>
    </div>
</nav>
