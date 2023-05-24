@extends('layouts.main')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('footer')
    @include('layouts.footer')
@endsection
@section('style')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .btn-cust-color {
            background-color: #0C1939;
            color: #EFEFEF
        }

        .btn-cust-color-sec {
            background-color: #EFEFEF;
            color: #404040
        }

        .btn-cust-color-sec:hover {
            background-color: #CECECE;
            color: #404040
        }

        .btn-cust-color:hover {
            background-color: #203978;
            color: #EFEFEF
        }

        .bg-cust-color {
            background-color: #0C1939;
        }

        .card-cust {
            background-color: #D9D9D9;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
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
            overflow-x: hidden;
            padding-top: 0;
            padding-bottom: 2rem;
            color: #5a5a5a;
        }

        .carousel-inner {
            padding: 1em;
        }

        .card {
            margin: 0 0.5em;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            border: none;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: #0C1939;
            width: 6vh;
            height: 6vh;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        @media (min-width: 768px) {
            .carousel-item {
                margin-right: 0;
                flex: 0 0 33.333333%;
                display: block;
                color: #404040
            }

            .carousel-inner {
                display: flex;
            }
        }

        .card .img-wrapper {
            max-width: 100%;
            height: 13em;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card img {
            max-height: 100%;
        }

        @media (max-width: 767px) {
            .card .img-wrapper {
                height: 17em;
            }
        }

        .marketing .col-lg-4 {
            margin-top: 5rem;
            margin-bottom: 5rem;
            text-align: center;
            color: #404040;
        }

        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }

        .featurette-divider {
            margin: 4rem 0;
        }

        .featurette-heading {
            letter-spacing: -.05rem;
        }

        @media (min-width: 40em) {
            .carousel-caption p {
                margin-bottom: 1.25rem;
                font-size: 1.25rem;
                line-height: 1.4;
            }

            .featurette-heading {
                font-size: 50px;
            }
        }

        @media (min-width: 62em) {
            .featurette-heading {
                margin-top: 7rem;
            }
        }
    </style>
@endsection
@section('main')
    <div class="marketing container" style="margin-top: 100px">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1 mx-5">Belajar disini bisa bikin makin pintar</h2>
                <br>
                <p class="lead mx-5">Karena materi di Bidji Course ini simpel dan lengkap. Pokoknya bakal sesuai dengan
                    kebutuhanmu.</p>
                <br>
                <a class="btn btn-dark mx-5 text-white" href="{{ route('materi.index') }}">Mulai Belajar</a>
            </div>
            <div class="col-md-5">
                <img src="/img/assets/jumbo.svg" width="500" height="500">
            </div>
        </div>
        <div class="d-flex gap-4 row text-center">
            <div class="col card-cust rounded-1 py-5">
                <img src="/img/assets/monitor.png" alt="icon" width="150" height="150">
                <h3 class="fw-semibold my-3">Belajar lewat video</h3>
                <p>Meskipun belajar online, kamu bisa tetap dapat gambarannya</p>
            </div>
            <div class="col card-cust rounded-1 py-5">
                <img src="/img/assets/icon flexible.png" alt="icon" width="150" height="150">
                <h3 class="fw-semibold my-3">Belajar lebih flexible</h3>
                <p>Tetap bisa belajar kapanpun dan dimanapun kamu berada</p>
            </div>
            <div class="col card-cust rounded-1 py-5">
                <img src="/img/assets/icon mobile.png" alt="icon" width="150" height="150">
                <h3 class="fw-semibold my-3">Akses yang mudah</h3>
                <p>Gunakan intenet dan gadget sehari-harimu untuk belajar yang lebih efektif</p>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-semibold lh-1 mx-5">Bisa belajar gratis</h2>
                <p class="lead mx-5">Bidji Course mendukung seluruh anak muda di Indonesia untuk tetap bisa belajar, tanpa
                    harus terhalang biaya apapun</p>
            </div>
            <div class="col-md-5 order-md-1">
                <div class="col-md-5">
                    <img class="rounded" src="/img/assets/bakar.jpg" width="500" height="350">
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <h1 class="mx-4">Rekomendasi Materi</h1>
        <div class="carousel" id="carouselExampleControls" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($courses as $course)
                    <div class="carousel-item">
                        <div class="card h-100">
                            <div class="img-wrapper">
                                <img class="rounded-top d-block w-100" src="{{ $course->cover }}" alt="{{ $course->title }}" style="object-fit: cover; aspect-ratio: 16 / 9;">
                            </div>
                            <div class="card-body">
                                <a class="text-decoration-none" href="{{ route('materi.index', ['category' => $course->category->slug]) }}" style="font-size: 13px">{{ $course->category->name }}</a>
                                <h5 class="card-title mt-2">{{ $course->title }}</h5>
                                <p class="card-text">{{ $course->desc }}</p>
                            </div>
                            <div class="card-footer border-0 bg-white">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="badge" style="font-size: 13px; background-color: rgb(234, 234, 234)">
                                        <span class="text-muted"><i class="ti ti-bookmark-filled text-warning"></i>
                                            {{ $course->favorite }}</span>
                                    </div>
                                    <a class="btn btn-sm btn-dark" href="{{ route('materi.show', $course->slug) }}">Belajar Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" data-bs-target="#carouselExampleControls" data-bs-slide="prev" type="button">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" data-bs-target="#carouselExampleControls" data-bs-slide="next" type="button">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-semibold lh-1">Quiz untuk mengasah kemampuan</h2>
                <p class="lead">Kamu bisa mengasah sejauh mana pemahamanmu tentang materi yang kamu pelajari</p>
            </div>
            <div class="col-md-5">
                <div class="col-md-5">
                    <img class="rounded" src="img/assets/quiz.jpg" width="500" height="350">
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="bg bg-cust-color bold-shadow rounded-4 p-5 text-center text-white">
            <h2 class="font-weight-500 mb-3">Tunggu apa lagi?</h2>
            <p>Yuk belajar bareng Bidji Course</p>
            <a class="btn btn-light remove-style-link gtm-reg-btn-a mt-3" href="{{ route('register.index') }}">Buat Akun</a>
        </div>

    </div>
@endsection
@section('script')
    <script>
        var multipleCardCarousel = $('#carouselExampleControls');
        if (window.matchMedia('(min-width: 768px)').matches) {
            var carousel = new bootstrap.Carousel(multipleCardCarousel, {
                interval: false,
            });
            var carouselWidth = $('.carousel-inner')[0].scrollWidth;
            var cardWidth = $('.carousel-item').width();
            var scrollPosition = 0;
            $('#carouselExampleControls .carousel-control-next').on('click', function() {
                if (scrollPosition < carouselWidth - cardWidth * 4) {
                    scrollPosition += cardWidth;
                    $('#carouselExampleControls .carousel-inner').animate({
                            scrollLeft: scrollPosition
                        },
                        600
                    );
                }
            });
            $('#carouselExampleControls .carousel-control-prev').on('click', function() {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $('#carouselExampleControls .carousel-inner').animate({
                            scrollLeft: scrollPosition
                        },
                        600
                    );
                }
            });
        } else {
            $(multipleCardCarousel).addClass('slide');
        }
    </script>
@endsection
