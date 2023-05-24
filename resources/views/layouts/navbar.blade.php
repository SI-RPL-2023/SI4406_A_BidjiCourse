<nav class="navbar navbar-expand-lg navbar-light d-flex fixed-top-sm fixed-top flex-row bg-white shadow-sm">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="/img/assets/Bidji Logo.svg" width="60" height="auto">
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" type="button" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <form action="{{ route('materi.index') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control" id="navbarSearch" name="search" type="text" value="{{ request('search') }}" style="width: auto" placeholder="Mau belajar apa hari ini?" required>
                        <button class="input-group-text text-secondary" type="submit" id="navbarSubmit">
                            <i class="ti ti-search"></i>
                        </button>
                    </div>
                </form>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('materi*') ? 'active' : '' }} mx-1" href="{{ route('materi.index') }}" aria-current="page">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('favorites*') ? 'active' : '' }} mx-1" href="{{ route('favorites.index') }}">Favorit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('activities*') ? 'active' : '' }} mx-1" href="{{ route('activities.index') }}">Aktivitas</a>
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
