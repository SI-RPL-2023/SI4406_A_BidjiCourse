<!doctype html>
<html lang="en">

<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    @include('layouts.head-import')

    @yield('head-script')

    <style>
        
        
        .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 0;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%); }
        #sidebar {
        min-width: 220px;
        max-width: 220px;
        color: #fff;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        position: relative;
        z-index: 0;
        border-left: 2px solid rgba(0, 0, 0, 0.05); }
        #sidebar ul li a {
        padding: 10px 0;
        display: block;
        color: black;
        border-bottom: 2px solid rgba(0, 0, 0, 0.05); }
        
        h5,.h5 {
        line-height: 1.5;
        font-weight: 400;
        font-family: "Poppins", Arial, sans-serif;
        color: #000; }
        
        a[data-toggle="collapse"] {
         position: relative; }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .custom-divider {
            border-top: 2px solid rgba(0, 0, 0, .15);
            margin-top: 20px ; 
        }
        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        
        
        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        body {
            font-size: .800rem;
        }

        
        
        

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
            text-align: left;
        }

        .navbar .navbar-toggler {
            top: .20rem;
            
        }

        .navbar .form-control {
            padding: .60rem 1rem;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }
    </style>

    @yield('style')

    <div class="loading-animation">
        <x-loader.pencil></x-loader.pencil>
    </div>
</head>

<body>
    @include('materi.layouts.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('materi.layouts.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4" data-aos="fade-up" data-aos-duration="1000">
                @yield('main')
            </main>
        </div>
    </div>

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

    <div style="margin-top: 300px"></div>

</body>

</html>
