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
@php
    if (is_null(auth()->user()->avatar)) {
        $avatar_src = '/img/assets/' . (auth()->user()->gender == 'Perempuan' ? 'fe' : '') . 'male-avatar.jpg';
    } else {
        $avatar_src = auth()->user()->avatar;
    }
@endphp
<div class="dropdown" x-data="{ open: false }" x-on:click="open = !open" x-on:click.away="open = false" x-on:mouseenter="open = true" x-on:mouseleave="open = false">
    <div class="dropdown-toggle d-flex align-items-center gap-2" type="button">
        {{ explode(' ', auth()->user()->full_name)[0] }}
        <img class="rounded-circle img-fluid border-3 border-warning border" src="{{ $avatar_src }}" alt="avatar" style="width: 35px; height: 35px; object-fit: cover">
    </div>
    <template x-if="open" x-transition>
        <ul class="dropdown-menu d-block">
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
    </template>
</div>
