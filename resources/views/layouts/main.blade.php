<!doctype html>
<html lang="en">

<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    @include('layouts.head-import')
    @yield('head-script')
    @yield('style')
</head>

<body>
    <header>
        @yield('navbar')
    </header>
    <main data-aos="fade-up" data-aos-duration="500">
        @yield('left-sidebar')
        @yield('main')
        @yield('right-sidebar')
    </main>
    <footer style="margin-top: 20%">
        @yield('footer')
    </footer>
    @include('layouts.body-import')
    @yield('script')
    @include('layouts.alert')
</body>

</html>
