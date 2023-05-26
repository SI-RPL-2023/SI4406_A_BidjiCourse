<link href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.02.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>


<nav class="navbar navbar-expand-lg navbar-light d-flex fixed-top-sm fixed-top flex-row bg-white shadow-sm">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="/img/assets/Bidji Logo.svg" width="60" height="auto">
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" type="button" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse">
            @if (!Request::is('materi'))
                <ul class="navbar-nav">
                    <form action="{{ route('materi.index') }}" method="GET" id="filterForm">
                        <div class="input-group m-auto">
                            <input class="form-control" id="searchBar" name="search" type="search" value="{{ request('search') }}" autocomplete="off" placeholder="Mau belajar apa hari ini?" required>
                            <button class="input-group-text text-secondary" id="navbarSubmit" type="submit">
                                <i class="ti ti-search"></i>
                            </button>
                        </div>
                    </form>
                </ul>
            @endif
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : null }} mx-1" href="{{ route('index') }}" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('materi') ? 'active' : null }} mx-1" href="{{ route('materi.index') }}" aria-current="page">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('favorites') ? 'active' : null }} mx-1" href="{{ route('favorites.index') }}">Favorit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('activities') ? 'active' : null }} mx-1" href="{{ route('activities.index') }}">Aktivitas</a>
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


<script>
    $(document).ready(function() {
        const searchBar = new autoComplete({
            selector: '#searchBar',
            highlight: true,
            data: {
                src: async (query) => {
                    try {
                        const source = await fetch(`{{ url('materi/search') }}/${query}`);
                        const data = await source.json();
                        return data;
                    } catch (error) {
                        return error;
                    }
                },
            },
            resultsList: {
                maxResults: 5,
            },
            resultItem: {
                highlight: 'p-0',
            },
            events: {
                input: {
                    selection: (event) => {
                        searchBar.input.value = event.detail.selection.value;
                        $('#filterForm').submit();
                    }
                }
            }
        });
    })
</script>
