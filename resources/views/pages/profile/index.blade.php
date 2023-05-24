@extends('layouts.main')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('footer')
    @include('layouts.footer')
@endsection
@section('style')
    <style>
        body {
            background: #f8f9fa
        }
    </style>
@endsection
@section('main')
    <div class="container" style="margin-top: 100px">
        @include('layouts.profile')
    </div>
@endsection
