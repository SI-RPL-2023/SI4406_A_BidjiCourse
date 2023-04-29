<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
    <div class="position-sticky sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link d-flex {{ Request::is('dashboard') ? 'active' : '' }} gap-2" href="{{ route('dashboard.index') }}" aria-current="page">
                    <i class="ti ti-home fs-5"></i>Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex {{ Request::is('dashboard/courses*') ? 'active' : '' }} gap-2" href="{{ route('courses.index') }}">
                    <i class="ti ti-book fs-5"></i>Courses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex {{ Request::is('dashboard/quizzez*') ? 'active' : '' }} gap-2" href="{{ route('quizzes.index') }}">
                    <i class="ti ti-checklist fs-5"></i>Quizzez
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex {{ Request::is('dashboard/users*') ? 'active' : '' }} gap-2" href="{{ route('users.index') }}">
                    <i class="ti ti-user fs-5"></i>Users
                </a>
            </li>
        </ul>
    </div>
</nav>
