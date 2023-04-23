@extends('pages.dashboard.layouts.main')
@section('style')
    <style>

    </style>
@endsection
@section('main')
    @php
        $delete_tlp = auth()->user()->id == $user->id ? 'Untuk alasan keamanan, anda tidak diperbolehkan menghapus akun anda sendiri' : 'Delete this user';
        $edit_tlp = auth()->user()->id == $user->id ? 'Untuk alasan keamanan, anda tidak diperbolehkan mengubah role anda sendiri' : "Edit this user's role";
    @endphp
    <div class="container mb-5 mt-4 rounded bg-white">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center p-1 py-2 text-center">
                    <img class="rounded-circle mt-5 mb-2 shadow" src="/img/assets/{{ $user->gender == 'Laki-laki' ? '' : 'fe' }}male-avatar.jpg" width="150px" height="150px">
                    <span><strong>{{ $user->full_name }}</strong></span>
                    <span class="text-secondary">{{ $user->email }}</span>
                    <div class="d-flex mt-4 gap-2">
                        <a class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-title="Kembali ke halaman users" href="{{ route('users.index') }}">
                            <i class="ti ti-arrow-back-up"></i> Back
                        </a>
                        <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-title="{{ $edit_tlp }}" tabindex="0">
                            <a class="{{ auth()->user()->id == $user->id ? 'disabled' : '' }} btn btn-sm btn-primary" id="edit" href="{{ route('users.edit', $user->id) }}">
                                <i class="ti ti-edit"></i> Edit Role
                            </a>
                        </span>
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
                        <h4 class="text-right">User's Profile</h4>
                    </div>
                    <div class="row mt-3 gap-3">
                        <div class="col-md-12">
                            <label class="labels">ID</label>
                            <input class="form-control" type="text" value="{{ $user->id }}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Role</label>
                            <input class="form-control" type="text" value="{{ $user->is_admin ? 'Admin' : 'Student' }}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Nama Lengkap</label>
                            <input class="form-control" type="text" value="{{ $user->full_name }}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input class="form-control" type="text" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Jenis Kelamin</label>
                            <input class="form-control" type="text" value="{{ $user->gender }}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Tanggal Lahir</label>
                            <input class="form-control {{ is_null($user->bord_date) ? 'text-secondary fst-italic' : '' }}" type="{{ is_null($user->bord_date) ? 'text' : 'date' }}" value="{{ is_null($user->born_date) ? 'not_set' : $user->born_date }}" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Nomor Telepon</label>
                            <input class="form-control {{ is_null($user->number) ? 'text-secondary fst-italic' : '' }}" type="text" value="{{ is_null($user->number) ? 'not_set' : $user->number }}" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Created At</label>
                            <input class="form-control" type="date" value="{{ $user->created_at }}" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Updated At</label>
                            <input class="form-control" type="date" value="{{ $user->updated_at }}" readonly>
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
