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
            overflow-x: hidden;
        }


        body {
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
            background-color: #EFEFEF
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
    <div class="container marketing" style="margin-top: 100px">
        <div class="row featurette">
            <div class="col-md-7 ">
                <h2 class="featurette-heading fw-normal lh-1 mx-5">Belajar disini bisa bikin makin pintar</h2>
                <br>
                <p class="lead mx-5">Karena materi di Bidji Course ini simpel dan lengkap. Pokoknya bakal sesuai dengan
                    kebutuhanmu.</p>
                <br>
                <a href="#" class="btn btn-cust-color text-white mx-5">Mulai bergabung</a>
            </div>
            <div class="col-md-5">
                <img src="img/jumbo.svg" width="500" height="500">
            </div>
        </div>
        <!-- Three columns of text below the carousel -->
        <div class="d-flex gap-4">
            <div class="col-lg-4 card-cust py-5 rounded-1">
                <img src="img/monitor.png" width="150" height="150" alt="icon">
                <h3 class="fw-semibold my-3">Belajar lewat video</h3>
                <p>Meskipun belajar online, kamu bisa tetap dapat gambarannya</p>
            </div>
            <div class="col-lg-4 card-cust py-5 rounded-1">
                <img src="img/icon flexible.png" width="150" height="150" alt="icon">
                <h3 class="fw-semibold my-3">Belajar lebih flexible</h3>
                <p>Tetap bisa belajar kapanpun dan dimanapun kamu berada</p>
            </div>
            <div class="col-lg-4 card-cust py-5 rounded-1">
                <img src="img/icon mobile.png" width="150" height="150" alt="icon">
                <h3 class="fw-semibold my-3">Akses yang mudah</h3>
                <p>Gunakan intenet dan gadget sehari-harimu untuk belajar yang lebih efektif</p>
            </div>
        </div><!-- /.row -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-semibold lh-1 mx-5">Bisa belajar gratis</h2>
                <p class="lead mx-5">Bidji Course mendukung seluruh anak muda di Indonesia untuk tetap bisa belajar, tanpa
                    harus terhalang biaya apapun</p>
            </div>
            <div class="col-md-5 order-md-1">
                <div class="col-md-5">
                    <img src="img/bakar.jpg" width="500" height="350">
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <h1 class="mx-4">Materi di Bidji</h1>
        <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card">
                        <div class="img-wrapper"><img src="img/math.jpg" class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Matematika</h5>
                            <p class="card-text">Disini bisa belajar aljabar, himpunan, linear, segitiga & segiempat, dan
                                peluang.</p>
                            <a href="#" class="btn btn-cust-color">Coba belajar</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="img/science.jpg" class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Ilmu Pengetahuan Alam</h5>
                            <p class="card-text">Disini bisa belajar ekologi, reproduksi, gerak dan gaya, kelistrikan, dan
                                tata surya.</p>
                            <a href="#" class="btn btn-cust-color">Coba belajar</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="img/english.jpg" class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Bahasa Inggris</h5>
                            <p class="card-text">Disini bisa belajar grammar, descriptive text, narative text, report, dan
                                advertisement</p>
                            <a href="#" class="btn btn-cust-color">Coba belajar</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="img/globe.jpg" class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Ilmu Pengetahuan Sosial</h5>
                            <p class="card-text">Disini bisa belajar letak geografis, sejarah, ekonomi, interaksi sosial,
                                dan badan usaha</p>
                            <a href="#" class="btn btn-cust-color">Coba belajar</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="img/garuda.jpg" class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Pendidikan Kewarganegaraan</h5>
                            <p class="card-text">Disini bisa belajar UUD 1945, pancasila, norma, hukum, dan sejarah
                                indonesia </p>
                            <a href="#" class="btn btn-cust-color">Coba belajar</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="img/indo.jpg" class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Bahasa indonesia</h5>
                            <p class="card-text">Disini bisa belajar puisi, surat, literasi buku, fabel, dan teks deskripsi
                            </p>
                            <a href="#" class="btn btn-cust-color">Coba belajar</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="img/mosque.jpg" class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Pendidikan Agama Islam</h5>
                            <p class="card-text">Disini bisa belajar sejarah islam, tajwid, zakat, haji, dan qurban</p>
                            <a href="#" class="btn btn-cust-color">Coba belajar</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



        <!-- Marketing messaging and featurettes
                          ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->



        <!-- START THE FEATURETTES -->


        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-semibold lh-1">Quiz untuk mengasah kemampuan</h2>
                <p class="lead">Kamu bisa mengasah sejauh mana pemahamanmu tentang materi yang kamu pelajari</p>
            </div>
            <div class="col-md-5">
                <div class="col-md-5">
                    <img src="img/quiz.jpg" width="500" height="350">
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->


        <div class="bg bg-cust-color bold-shadow rounded-4 text-center text-white p-5">
            <h2 class="font-weight-500 mb-3">Tunggu apa lagi?</h2>
            <p>Yuk belajar bareng Bidji Course</p>
            <a href="" class="btn btn-cust-color-sec remove-style-link mt-3 gtm-reg-btn-a ">Buat Akun</a>
        </div>

    </div><!-- /.container -->
@endsection
@section('script')
    <script>
        var multipleCardCarousel = document.querySelector(
            "#carouselExampleControls"
        );
        if (window.matchMedia("(min-width: 768px)").matches) {
            var carousel = new bootstrap.Carousel(multipleCardCarousel, {
                interval: false,
            });
            var carouselWidth = $(".carousel-inner")[0].scrollWidth;
            var cardWidth = $(".carousel-item").width();
            var scrollPosition = 0;
            $("#carouselExampleControls .carousel-control-next").on("click", function() {
                if (scrollPosition < carouselWidth - cardWidth * 4) {
                    scrollPosition += cardWidth;
                    $("#carouselExampleControls .carousel-inner").animate({
                            scrollLeft: scrollPosition
                        },
                        600
                    );
                }
            });
            $("#carouselExampleControls .carousel-control-prev").on("click", function() {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $("#carouselExampleControls .carousel-inner").animate({
                            scrollLeft: scrollPosition
                        },
                        600
                    );
                }
            });
        } else {
            $(multipleCardCarousel).addClass("slide");
        }
    </script>
@endsection
