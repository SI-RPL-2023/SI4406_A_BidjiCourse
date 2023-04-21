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
<div class="dropdown" x-data="{ open: false }" x-on:click="open = !open" x-on:click.away="open = false" x-on:mouseenter="open = true" x-on:mouseleave="open = false">
    <div class="dropdown-toggle d-flex align-items-center gap-1" type="button">
        {{ auth()->user()->full_name }}
        <i class="ti ti-user-circle fs-2"></i>
    </div>
    <ul class="dropdown-menu" x-bind:style="open ? 'display: block' : 'display: none'">
        <li>
            <a class="dropdown-item" href=""><i class="ti ti-settings"></i> Pengaturan</a>
        </li>
        <li>
            <a class="dropdown-item text-warning" href=""><i class="ti ti-star-filled"></i> Favorite</a>
        </li>
        <li>
            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="ti ti-logout"></i> Logout</a>
        </li>
    </ul>
</div>

{{-- <div class="dropdown" id="profile-dropdown">
    <div class="dropdown-toggle d-flex align-items-center gap-1" id="profile-toggle" data-bs-toggle="dropdown" type="button">
        {{ auth()->user()->full_name }}
        <i class="ti ti-user-circle fs-2"></i>
    </div>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href=""><i class="ti ti-settings"></i> Pengaturan</a>
        </li>
        <li>
            <a class="dropdown-item text-warning" href=""><i class="ti ti-star-filled"></i> Favorite</a>
        </li>
        <li>
            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="ti ti-logout"></i> Logout</a>
        </li>
    </ul>
</div>
<script>
    $(document).ready(function() {
        $('#profile-dropdown').hover(function() {
            $('#profile-toggle', this).trigger('click');
        });
    });
</script> --}}
