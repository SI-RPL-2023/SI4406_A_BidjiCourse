<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.head-import')

    @yield('head-script')

    @yield('style')

    <div class="loading-animation">
        <x-loader.pencil></x-loader.pencil>
    </div>
</head>

<body>
    <header>
        @yield('navbar')
    </header>

    <main data-aos="fade-up" data-aos-duration="1000">
        @yield('main')
    </main>

    <footer class="container" style="margin-top: 20%">
        @yield('footer')
    </footer>

    @include('layouts.body-import')

    @yield('script')

    @if (session()->has('alert'))
        <script>
            Swal.fire({
                icon: '{{ session('alert') }}',
                title: '{{ session('title') }}',
                text: '{{ session('text') }}',
                html: '{!! session('html') !!}',
                confirmButtonColor: '#0d6efd',
            });
        </script>
    @endif

</body>

</html>
