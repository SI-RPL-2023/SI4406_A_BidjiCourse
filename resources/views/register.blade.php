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
        <h3>Daftar Bidji Course, yuk!</h3>
    </div>
    <div class="d-flex justify-content-center container">
        <div class="containt-box flex justify-content-center mt-4 mb-5">
            <form class="row g-3 w-90 flex flex-column align-items-center pt-4" action="{{ route('register.store') }}"
                method="POST">
                @csrf

                <div class="col-md-10">
                    <label for="full_name" class="form-label" style="font-size: 20px; font-weight: 600;">Nama Lengkap</label>
                    <input required type="text" class="form-control @error('full_name') is-invalid @enderror"
                        id="full_name" name="full_name" placeholder="Tulis nama lengkap kamu"
                        value="{{ old('full_name') }}">
                    @error('full_name')
                        <div class="text-danger text-start" style="font-size: 13px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-10">
                    <label for="email" class="form-label" style="font-size: 20px; font-weight: 600;">Email</label>
                    <input required type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Gunakan alamat email aktifmu" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger text-start" style="font-size: 13px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-10">
                    <label for="gender" class="form-label" style="font-size: 20px; font-weight: 600;">Jenis
                        Kelamin</label>
                    <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                        <option value="" selected>Pilih Gender</option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('gender')
                        <div class="text-danger text-start" style="font-size: 13px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-10" x-data="{ show: false }">
                    <label for="password" class="form-label" style="font-size: 20px; font-weight: 600;">Password</label>
                    <div class="input-group">
                        <input required x-bind:type="show ? 'text' : 'password'" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                            placeholder="Password">
                        <button x-on:click="show = !show" class="input-group-text text-secondary" type="button">
                            <i x-bind:class="show ? 'bi bi-eye-slash' : 'bi bi-eye'"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="text-danger text-start" style="font-size: 13px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-10" x-data="{ show: false }">
                    <label for="password_confirm" class="form-label" style="font-size: 20px; font-weight: 600;">Konfirmasi Password</label>
                    <div class="input-group">
                        <input required x-bind:type="show ? 'text' : 'password'" class="form-control" id="password_confirm" name="password_confirm"
                            placeholder="Konfirmasi password">
                        <button x-on:click="show = !show" class="input-group-text text-secondary" type="button">
                            <i x-bind:class="show ? 'bi bi-eye-slash' : 'bi bi-eye'"></i>
                        </button>
                    </div>
                </div>

                <div class="col-md-10">
                    <button class="btn btn-dark mt-4 w-100 submit-btn" type="submit">Daftar</button>
                </div>

            </form>
            <div class="pt-3 text-center">
                <p style="font-size: 12px;">Sudah punya akun? <a href="{{ route('login.index') }}"
                        style="color: black;">Masuk Sekarang</a></p>
            </div>
            <p class="text-secondary text-center">
                Dengan melakukan pendaftaran, Anda setuju dengan
                <a href="">syarat & ketentuan Bidji Course.</a>
            </p>
        </div>
    </div>
@endsection
