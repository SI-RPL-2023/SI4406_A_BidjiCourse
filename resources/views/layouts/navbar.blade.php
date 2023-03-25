<nav
    class="navbar navbar-v3-2 bg-white default-layout-navbar navbar-expand-lg navbar-light d-flex flex-row fixed-top-sm fixed-top shadow">
    <div class="container-xl">
        <a class="navbar-brand" href="#">
            <img src="{{ ('img/Bidji Logo.svg ') }}" width="70" height="auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex" role="search" action="">
            <div class="input-group">
                <input required type="text" class="form-control" id="nav-search" name="nav-search"
                    placeholder="Apa yang ingin Anda pelajari?" style="width: 350px">
                <button class="input-group-text text-secondary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            {{-- <input class="form-control me-2" style="" type="search" placeholder="Apa yang ingin Anda pelajari?"> --}}
            {{-- <button class="btn btn-dark" type="submit">Search</button> --}}
        </form>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active mx-1" aria-current="page" href="#">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1" href="#">Favorit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1" href="#">Aktivitas</a>
                </li>
                @can('admin')
                    <li class="nav-item">
                        <a class="nav-link mx-1" href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>
                @endcan
            </ul>
            <ul class="navbar-nav ms-auto">
                @if(!auth()->user())
                    <li class="nav-item">
                        <a href="{{ route('login.index') }}" class="btn btn-light btn-outline-secondary mx-1 ">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register.index') }}" class="btn btn-dark mx-1 ">Daftar</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="btn btn-light btn-outline-secondary mx-1 ">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
