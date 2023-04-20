<nav
    class="navbar navbar-v3-2 bg-white default-layout-navbar navbar-expand navbar-light d-flex flex-row  fixed-top shadow">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route($route) }}">
            <i class="ti ti-arrow-narrow-left fs-2"></i>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto d-block text-center">
                <a href="" style="font-size: 13px">Category</a>
                <div class="fs-5">{{ $title }}</div>
            </ul>
            <ul class="navbar-nav ms-auto">
                <x-widget.profile-dropdown></x-widget.profile-dropdown>
            </ul>
        </div>
    </div>
</nav>
