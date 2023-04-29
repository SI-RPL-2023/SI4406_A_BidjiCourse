@extends('pages.dashboard.layouts.main')
@section('style')
    <style>
        .card-body .ti {
            font-size: 50px;
            stroke-width: 1px
        }
    </style>
@endsection
@section('main')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
        <h3>👋 Welcome back, <strong>{{ auth()->user()->full_name }}</strong></h3>
    </div>
    <div class="col-md">
        <div class="row row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-100 mb-3 text-white" style="max-width: 18rem; background-color: #17a2b8">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="ti ti-book"></i>
                        <div>
                            <h2 class="card-title"><strong>{{ $courses }}</strong></h2>
                            <p class="card-text">Course{{ $courses > 1 ? 's' : '' }}</p>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #148a9d">
                        <a class="text-decoration-none text-light d-flex align-items-center justify-content-center" href="{{ route('courses.index') }}">More info <i class="ti ti-circle-arrow-right-filled fs-5 mx-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 mb-3 text-white" style="max-width: 18rem; background-color: #8c3be3">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="ti ti-checklist"></i>
                        <div>
                            <h2 class="card-title"><strong>{{ $courses }}</strong></h2>
                            <p class="card-text">Quiz{{ $courses > 1 ? 'zes' : '' }}</p>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #6d21be">
                        <a class="text-decoration-none text-light d-flex align-items-center justify-content-center" href="{{ route('courses.index') }}">More info <i class="ti ti-circle-arrow-right-filled fs-5 mx-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 mb-3 text-white" style="max-width: 18rem; background-color: #28a745">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="ti ti-category"></i>
                        <div>
                            <h2 class="card-title"><strong>{{ $categories }}</strong></h2>
                            <p class="card-text">Categor{{ $categories > 1 ? 'ies' : 'y' }}</p>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #228e3b">
                        <a class="text-decoration-none text-light d-flex align-items-center justify-content-center" href="{{ route('users.index') }}">More info <i class="ti ti-circle-arrow-right-filled fs-5 mx-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 mb-3 text-white" style="max-width: 18rem; background-color: #ffc107">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="ti ti-users"></i>
                        <div>
                            <h2 class="card-title"><strong>{{ $admins }}</strong></h2>
                            <p class="card-text">Admin{{ $admins > 1 ? 's' : '' }}</p>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #d9a406">
                        <a class="text-decoration-none text-light d-flex align-items-center justify-content-center" href="{{ route('users.index') }}">More info <i class="ti ti-circle-arrow-right-filled fs-5 mx-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 mb-3 text-white" style="max-width: 18rem; background-color: #dc3545">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="ti ti-school"></i>
                        <div>
                            <h2 class="card-title"><strong>{{ $students }}</strong></h2>
                            <p class="card-text">Student{{ $students > 1 ? 's' : '' }}</p>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #bb2d3b">
                        <a class="text-decoration-none text-light d-flex align-items-center justify-content-center" href="{{ route('users.index') }}">More info <i class="ti ti-circle-arrow-right-filled fs-5 mx-2"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
