<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
    <a class="navbar-brand bg-light col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ route('index') }}">
        <img src="{{ ('img/Bidji Logo.svg ') }}" width="60" height="auto">
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-light w-100 rounded-0 border-1" type="text" placeholder="Search"
        aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="{{ route('logout') }}">
                <i class="ti ti-user fs-3 mx-3"></i>
            </a>
        </div>
    </div>
</header>