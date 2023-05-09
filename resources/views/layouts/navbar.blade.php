<nav class="navbar navbar-expand-lg navbar-light bg-white d-flex fixed-top-sm fixed-top flex-row shadow-sm">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ 'img/Bidji Logo.svg' }}" width="70" height="auto">
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" type="button" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse">
            <form class="d-flex" role="search" action="">
                <div class="input-group">
                    <input class="form-control" id="nav-search" name="nav-search" type="text" style="width: 350px" required placeholder="Mau belajar apa hari ini?">
                    <button class="input-group-text text-secondary" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('materi*') ? 'active' : '' }} mx-1" href="{{ route('materi.index') }}" aria-current="page">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('favourite') ? 'active' : '' }} mx-1" href="#">Favorit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('act') ? 'active' : '' }} mx-1" href="#">Aktivitas</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @if (!auth()->user())
                    <li class="nav-item">
                        <a class="btn btn-secondary mx-1" href="{{ route('login.index') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-dark mx-1" href="{{ route('register.index') }}">Daftar</a>
                    </li>
                @else
                    <li class="nav-item">
                        <x-widget.profile-dropdown></x-widget.profile-dropdown>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

