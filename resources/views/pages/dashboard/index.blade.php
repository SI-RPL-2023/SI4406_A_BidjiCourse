@extends('pages.dashboard.layouts.main')
@section('style')
    <style>
    </style>
@endsection
@section('main')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
        <h3>👋 Welcome back, {{ auth()->user()->full_name }}</h3>
    </div>
    <div class="col-md-9">
        <div class="row row-cols-md-3 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 mb-3 text-white" style="max-width: 18rem; background-color: #17a2b8">
                    <div class="card-body d-flex gap-3 align-items-center">
                        <i class="ti ti-book" style="font-size: 50px"></i>
                        <div>
                            <h2 class="card-title"><strong>{{ $courses }}</strong></h2>
                            <p class="card-text">Courses</p>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #148a9d">
                        <a class="text-decoration-none text-light d-flex align-items-center justify-content-center" href="{{ route('courses.index') }}">More info <i class="ti ti-circle-arrow-right-filled fs-5 mx-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 mb-3 text-white" style="max-width: 18rem; background-color: #28a745">
                    <div class="card-body d-flex gap-3 align-items-center">
                        <i class="ti ti-users" style="font-size: 50px"></i>
                        <div>
                            <h2 class="card-title"><strong>{{ $users }}</strong></h2>
                            <p class="card-text">Users</p>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #228e3b">
                        <a class="text-decoration-none text-light d-flex align-items-center justify-content-center" href="{{ route('users.index') }}">More info <i class="ti ti-circle-arrow-right-filled fs-5 mx-2"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {})
    </script>
@endsection
