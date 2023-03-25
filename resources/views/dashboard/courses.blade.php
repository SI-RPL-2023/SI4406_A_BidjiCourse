@extends('dashboard.layouts.main')
@section('main')
    <h1>Courses</h1>
    <hr>
    <textarea class="mb-5" name="jodit" id="jodit"></textarea>
@endsection
@section('script')
    <script>
        const jodit = Jodit.make('#jodit');
        $(".jodit-placeholder").text("Tulis materi di sini...");
        $(".jodit-status-bar-link, .jodit-ui-group_group_info").remove();
        // $(".jodit-container").hide();
        // $('[aria-label="Print"]').trigger('click');
    </script>
@endsection