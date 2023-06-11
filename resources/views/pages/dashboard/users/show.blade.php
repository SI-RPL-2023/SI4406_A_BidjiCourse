@extends('pages.dashboard.layouts.main')
@section('style')
@endsection
@section('main')
    @php
        $delete_tlp = auth()->user()->id == $user->id ? 'Untuk alasan keamanan, kamu tidak diperbolehkan menghapus akun kamu sendiri' : 'Delete this user';
        $avatar_src = $user->avatar ?? '/img/assets/' . ($user->gender == 'Perempuan' ? 'fe' : '') . 'male-avatar.jpg';
    @endphp
    <div class="container mb-5 mt-4 rounded bg-white">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center p-1 py-2 text-center">
                    <img class="rounded-circle mt-5 mb-2 shadow" src="{{ $avatar_src }}" width="150px" height="150px">
                    <span><strong>{{ $user->full_name }}</strong></span>
                    <span class="text-secondary">{{ $user->email }}</span>
                    <div class="d-flex mt-4 gap-2">
                        <a class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-title="Kembali ke halaman users" href="{{ route('users.index') }}">
                            <i class="ti ti-arrow-back-up"></i> Back
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-title="{{ $delete_tlp }}" tabindex="0">
                                <button class="btn btn-sm btn-danger delete-user-btn" id="delete" type="submit" {{ auth()->user()->id == $user->id ? 'disabled' : '' }}>
                                    <i class="ti ti-trash"></i> Delete
                                </button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <h4 class="text-right">{{ explode(' ', $user->full_name)[0] }}'s Profile</h4>
                    </div>
                    <div class="row mt-3 gap-3">
                        <div class="col-md-12">
                            <label class="labels">ID</label>
                            <input class="form-control text-secondary" type="text" value="{{ $user->id }}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Role</label>
                            <input class="form-control text-secondary" type="text" value="{{ $user->is_admin ? 'Admin' : 'Student' }}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Nama Lengkap</label>
                            <input class="form-control text-secondary" type="text" value="{{ $user->full_name }}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input class="form-control text-secondary" type="text" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Jenis Kelamin</label>
                            <input class="form-control text-secondary" type="text" value="{{ $user->gender }}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Tanggal Lahir</label>
                            <input class="form-control {{ is_null($user->born_date) ? 'text-danger fst-italic' : 'text-secondary' }}" type="text" value="{{ is_null($user->born_date) ? 'not_set' : \Carbon\Carbon::parse($user->born_date)->format('d F Y') }}" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Nomor Telepon</label>
                            <input class="form-control {{ is_null($user->number) ? 'text-danger fst-italic' : 'text-secondary' }}" type="text" value="{{ is_null($user->number) ? 'not_set' : '(+62) ' . $user->number }}" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Created At</label>
                            <input class="form-control text-secondary" type="text" value="{{ \Carbon\Carbon::parse($user->created_at)->format('l, j F Y, g:i A') }}" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Updated At</label>
                            <input class="form-control text-secondary" type="text" value="{{ \Carbon\Carbon::parse($user->updated_at)->format('l, j F Y, g:i A') }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function getRandomColorValue() {
            return Math.floor(Math.random() * 256);
        }

        function getRandomColor() {
            const r = getRandomColorValue();
            const g = getRandomColorValue();
            const b = getRandomColorValue();
            return "rgb(" + r + ", " + g + ", " + b + ")";
        }

        function generateRandomGradient() {
            const color1 = getRandomColor();
            const color2 = getRandomColor();
            $('body').css('background', 'linear-gradient(to right, ' + color1 + ', ' + color2 + ')');
        }
        $(document).ready(function() {
            generateRandomGradient();
        });
    </script>
@endsection
