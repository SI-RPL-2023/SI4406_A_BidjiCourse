@extends('pages.dashboard.layouts.main')
@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>👋 Welcome back, {{ auth()->user()->full_name }}</h3>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
        })
    </script>
@endsection
