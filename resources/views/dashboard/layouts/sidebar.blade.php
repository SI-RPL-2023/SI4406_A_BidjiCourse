<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="{{ route('dashboard.index') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/courses*') ? 'active' : ''}}" href="{{ route('courses.index') }}">
                    <span data-feather="book-open" class="align-text-bottom"></span>
                    Courses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : ''}}" href="{{ route('users.index') }}">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Users
                </a>
            </li>
        </ul>
    </div>
</nav>