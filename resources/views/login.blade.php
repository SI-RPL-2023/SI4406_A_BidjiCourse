@extends('layouts.main')
@section('style')
    <style>
        .containt-box {
            width: auto;
            height: auto;
            border: 1px;
            /* box-shadow: 0px 3px 12px rgba(160, 159, 159, 0.8); */
            border-radius: 5px;
        }
        .submit-btn:hover {
            background-color: rgb(0, 0, 0);
        }
    </style>
@endsection
@section('main')
    <div class="text-center" style="padding-top: 100px">
        <h3>Masuk yuk buat belajar!</h3>
    </div>
    <div class="d-flex justify-content-center container">
        <div class="containt-box flex justify-content-center mt-4 mb-5">
            <form class="row g-3 w-90 flex flex-column align-items-center pt-4" action="{{ route('login.store') }}"
                method="POST">
                @csrf

                <div class="col-md-10">
                    <label for="email" class="form-label" style="font-size: 20px; font-weight: 600;">Email</label>
                    <input required type="text" class="form-control" id="email" name="email"
                        placeholder="Masukkan email yang telah kamu daftarkan" value="{{ old('email') }}">
                </div>

                <div class="col-md-10" x-data="{ show: false }">
                    <label for="password" class="form-label" style="font-size: 20px; font-weight: 600;">Password</label>
                    <div class="input-group">
                        <input required x-bind:type="show ? 'text' : 'password'" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <button x-on:click="show = !show" class="input-group-text text-secondary" type="button">
                            <i x-bind:class="show ? 'ti ti-eye-off fs-4' : 'ti ti-eye fs-4'"></i>
                        </button>
                    </div>
                </div>

                <div class="col-md-10">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <div class="col-md-10">
                    <button class="btn btn-dark mt-4 w-100 submit-btn" type="submit">Masuk</button>
                </div>

            </form>
            <div class="pt-3 text-center">
                <p style="font-size: 12px;">Belum punya akun? <a href="{{ route('register.index') }}"
                        style="color: black;">Daftar Sekarang</a></p>
            </div>
            <p class="text-secondary text-center">
                Dengan melakukan Login, Anda setuju dengan
                <a href="">syarat & ketentuan Bidji Course.</a>
            </p>
        </div>
    </div>
@endsection