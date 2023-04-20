<style>
    .dropdown-menu {
        animation: fadeInDown 0.5s;
    }

    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translateY(-10px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="dropdown">
    <div class="dropdown-toggle d-flex align-items-center gap-1" data-bs-toggle="dropdown" data-bs-animation="fade-up" type="button">
        {{ auth()->user()->full_name }}
        <i class="ti ti-user-circle fs-2"></i>
    </div>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href=""><i class="ti ti-settings"></i> Pengaturan</a></li>
        <li><a class="dropdown-item text-warning" href=""><i class="ti ti-star-filled"></i> Favorite</a></li>
        <li>
            <form action="{{ route('logout') }}" method="get">
                <button class="dropdown-item text-danger" type="submit"><i class="ti ti-logout"></i> Logout</button>
            </form>
        </li>
    </ul>
</div>

<script>
    $(document).ready(function() {
        $('.dropdown').hover(function() {
            $('.dropdown-toggle', this).trigger('click');
        });
    });
</script>
