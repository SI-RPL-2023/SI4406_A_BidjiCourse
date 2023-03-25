<style>
    .form-control {
        width: 350px;
    }
    

</style>

<nav class="navbar navbar-v3-2 bg-white default-layout-navbar navbar-expand-lg navbar-light d-flex flex-row fixed-top-sm fixed-top">
    <div class="container-xl">
        <a class="navbar-brand" href="#">
            <img src="{{ ('img/Bidji Logo.svg ') }}" alt="Bootstrap" width="50" height="45">
        </a>
        <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Apa yang ingin Anda pelajari" aria-label="Apa yang ingin Anda pelajari" >
              <!---  <button class="btn btn-dark" type="submit">Search</button> --->
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
                <li class="nav-item">
                    <a class="nav-link mx-1" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                    <a href="" class="btn btn-light btn-outline-secondary mx-1 " 
                        data-toggle="modal" data-target="">Masuk</a>
                </li>
                <li class="nav-item">
                    <a href="" class="btn btn-dark mx-1 " 
                        data-toggle="modal" data-target="">Daftar</a>
                </li>
            </ul>
           
        </div>
    </div>
</nav>
