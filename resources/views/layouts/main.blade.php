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

    {{-- <h3 class="loading-animation"></h3> --}}
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>

    <main>
        @yield('main')
    </main>

    <footer class="container" style="margin-top: 20%">
        @include('layouts.footer')
    </footer>

    @include('layouts.body-import')

    @yield('script')

    @if (session()->has('alert'))
        <script>
            Swal.fire({
                icon: '{{ session('alert') }}',
                text: '{{ session('text') }}'
            });
        </script>
    @endif

</body>

</html>