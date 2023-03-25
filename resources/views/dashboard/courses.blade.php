@extends('dashboard.index')
@section('main')
    <textarea class="mb-5" name="jodit" id="jodit"></textarea>
@endsection
@section('script')
    <script>
        const jodit = Jodit.make('#jodit');
        $(".jodit-placeholder").text("Tulis materi di sini...");
        $(".jodit-status-bar-link").remove();
    </script>
@endsection