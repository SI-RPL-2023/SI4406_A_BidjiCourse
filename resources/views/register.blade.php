@extends('layouts.main')
@section('style')
    <style>
        h3 {
            text-align: center;
            padding-top: 100px;
        }

        .containt-box {
            width: 500px;
            height: auto;
            border: 1px;
            box-shadow: 0px 3px 12px rgba(160, 159, 159, 0.8);
            border-radius: 5px;
            margin-top: 50px;
        }

        label {
            font-weight: 600;
            font-size: 20px;
        }

        input[type=button] {
            width: 415px;
            height: 38px;
            border: none;
            border-radius: 4px;
            margin-left: 40px;
            margin-top: 18px;
            font-size: 18px;
            background-color: rgb(16, 8, 51);
            color: white;
        }

        input[type=button]:hover {
            background-color: rgb(67, 66, 66);

        }
    </style>
@endsection
@section('main')
    <h3>Daftar Bidji Course, yuk!</h3>
    <div class="d-flex justify-content-center container">
        <div class="containt-box ">
            <form class="row g-3">
                <div class="col-md-10" style="margin-left: 40px; margin-top: 22px;">
                    <label for="#" class="form-label mt-3">Nama Lengkap</label>
                    <input type="text" class="form-control" id="#" name="#" placeholder="Tulis nama lengkapmu"
                        value="">
                </div>
                <div class="col-md-10" style="margin-left: 40px; margin-top: 14px;">
                    <label for="#" class="form-label">Asal Sekolah</label>
                    <input type="text" class="form-control" id="#" name="#"
                        placeholder="Tulis asal sekolahmu" value="">
                </div>
                <div class="col-md-10" style="margin-left: 40px; margin-top: 14px;">
                    <label for="#" class="form-label">Email</label>
                    <input type="text" class="form-control" id="#" name="#"
                        placeholder="Gunakan alamat email aktifmu" value="">
                </div>
                <div class="col-md-10" style="margin-left: 40px; margin-top: 14px;">
                    <label for="#" class="form-label">Password</label>
                    <input type="password" class="form-control" id="#" name="#"
                        placeholder="Password dengan minimal 8 karakter" value="">
                </div>
                <div class="col-md-10" style="margin-left: 40px; margin-top: 15px;">
                    <label for="#" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="#" name="#"
                        placeholder="Masukkan password kembali" value="">
                </div>
                <div class="button">
                    <input type="button" value="Daftar">
                </div>

                <p style="text-align: center; font-size: 13px; margin-top: 20px; margin-bottom: 20px;">
                    Sudah punya akun? <a href="{{ route('login') }}" style="color:black;">Login Sekarang</a>
                </p>
                <p class="text-secondary text-center">Dengan melakukan pendaftaran, Anda setuju dengan syarat & ketentuan Bidji Course.</p>
            </form>
        </div>
    </div>
@endsection
