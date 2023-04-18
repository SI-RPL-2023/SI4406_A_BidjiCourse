@extends('layouts.main')
@section('navbar')
    @include('layouts.navbar-simple', ['route' => 'materi.index', 'title' => 'Quiz📚 - Matematika'])
@endsection
@section('style')
    <style>
        main {
            margin-top: 100px;
        }

        html {
            background: #f8f9fa
        }

        .btn-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(35px, 1fr));
            gap: 7px;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: 300px;
            padding: 20px;
            background-color: white;
        }

        .quiz-nav {
            margin-top: 100px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: static;
                width: 100%;
            }

            .content {
                margin-right: 0;
            }

            .quiz-nav {
                margin-top: 0px;
            }
        }
    </style>
@endsection
@section('main')
    <div class="container-fluid bg-body-tertiary">
        <div class="row">
            <div class="col-md-8 mx-md-5 mb-4">
                <div class="container bg-white rounded" style="padding: 50px">
                    <h5 class="mb-5">Pertanyaan <strong class="fs-3">1</strong></h5>
                    <div class="alert alert-light">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis adipisci suscipit autem maiores,
                            consequatur enim iure doloremque iusto nemo obcaecati recusandae dolorum esse placeat libero!
                            Sunt,
                            autem. Dolores, beatae officia!</p>
                    </div>
                    <p>Pilih satu:</p>
                    <div class="answer mt-2 ml-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label ml-1" for="flexRadioDefault1">
                                A. Gambar bagian muka bumi pada bidang datar
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label ml-1" for="flexRadioDefault2">
                                B. Gambar tiruan bumi pada bidang datar
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label ml-1" for="flexRadioDefault2">
                                C. Gambar bumi pada bidang datar
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label ml-1" for="flexRadioDefault2">
                                D. Gambar negara-negara di dunia pada dinding
                            </label>
                        </div>
                    </div>
                    <div class="container-fluid mt-5">
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-dark" href="#" role="button"><i class="ti ti-chevron-left"></i>
                                Previous</a>
                            <a class="btn btn-dark" href="#" role="button">Next <i
                                    class="ti ti-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <h3 class="quiz-nav">Quiz Navigation</h3>
                    <p>Finish review...</p>
                    <div class="btn-container">
                        @for ($i = 0; $i < 40; $i++)
                            <a class="btn btn-outline-dark btn-sm" href="#" role="button"
                                style="width: 35px; height: 35px;">
                                {{ $i + 1 }}
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
