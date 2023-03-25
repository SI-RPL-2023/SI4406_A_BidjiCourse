@extends('layouts.main')
@section('style')
    <style>

        

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
        body {overflow-x: hidden;}
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
        <hr class="featurette-divider">

        <div class="row featurette ">
            <div class="col-md-7 ">
                <h2 class="featurette-heading fw-normal lh-1 mx-5">Materi simple <span class="text-muted">
                        dan lengkap.</span></h2>
                <p class="lead mx-5">Materi yang ada di Bidji Course akan sesuai dengan kebutuhan belajar kamu.</p>
            </div>
            <div class="col-md-5">
                <img src="img/foto 1.svg" width="500" height="500">
            </div>
        </div>

        <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>
                <h2 class="fw-normal">Heading</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the
                    first column.</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%"
                        fill="#777" dy=".3em">140x140</text>
                </svg>
                <h2 class="fw-normal">Heading</h2>
                <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second
                    column.</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%"
                        fill="#777" dy=".3em">140x140</text>
                </svg>
                <h2 class="fw-normal">Heading</h2>
                <p>And lastly this, the third column of representative placeholder content.</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


<div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="card">
                <div class="img-wrapper"><img src="img/math.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Matematika</h5>
                    <p class="card-text">Disini bisa belajar aljabar, himpunan, linear, segitiga & segiempat, dan peluang.</p>
                    <a href="#" class="btn btn-secondary">Coba belajar</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/science.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Ilmu Pengetahuan Alam</h5>
                    <p class="card-text">Disini bisa belajar perubahan fisika dan kimia, sistem reproduksi, sistem organ tubuh manusia, struktur pada tumbuhan, dan klasifikasi zat.</p>
                    <a href="#" class="btn btn-secondary">Coba belajar</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/english.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Bahasa Inggris</h5>
                    <p class="card-text">Disini bisa belajar grammar, descriptive text, narative text, report, dan advertisement</p>
                    <a href="#" class="btn btn-secondary">Coba belajar</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/globe.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Ilmu Pengetahuan Sosial</h5>
                    <p class="card-text">Disini bisa belajar letak geografis, sejarah, ekonomi, interaksi sosial, dan badan usaha</p>
                    <a href="#" class="btn btn-secondary">Coba belajar</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/garuda.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Pendidikan Kewarganegaraan</h5>
                    <p class="card-text">Disini bisa belajar UUD 1945, pancasila, norma, hukum, dan sejarah indonesia </p>
                    <a href="#" class="btn btn-secondary">Coba belajar</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/indo.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Bahasa indonesia</h5>
                    <p class="card-text">Disini bisa belajar puisi, surat, literasi buku, fabel, dan teks deskripsi</p>
                    <a href="#" class="btn btn-secondary">Coba belajar</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/mosque.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Pendidikan Agama Islam</h5>
                    <p class="card-text">Disini bisa belajar sejarah islam, tajwid, zakat, haji, dan qurban</p>
                    <a href="#" class="btn btn-secondary">Coba belajar</a>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
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
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-normal lh-1 mx-5">Bisa belajar <span class="text-muted">gratis</span></h2>
                <p class="lead mx-5">Bidji Course mendukung seluruh anak muda di Indonesia untuk tetap bisa belajar, tanpa harus terhalang biaya apapun</p>
            </div>
            <div class="col-md-5 order-md-1">
                <div class="col-md-5">
                    <img src="img/bakar.jpg" width="500" height="350">
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Quiz untuk <span
                        class="text-muted">mengasah kemampuan</span></h2>
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
        <div class="container">
            <div class="bg-secondary bold-shadow rounded-4 text-center text-white p-5">
                <h2 class="font-weight-500 mb-3">Tunggu apa lagi?</h2>
                <p>Belajar lebih terarah dengan Bidji Course</p>
                <a href="" class="btn btn-light remove-style-link mt-3 gtm-reg-btn-a ">Buat Akun</a>
            </div>
        </div>

    </div><!-- /.container -->
@endsection
