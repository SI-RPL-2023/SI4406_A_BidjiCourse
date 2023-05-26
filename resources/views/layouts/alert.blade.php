@if (session()->has('alert'))
    <script>
        swalCustom.fire({
            icon: `{{ session('alert') }}`,
            title: `{{ session('title') }}`,
            text: `{{ session('text') }}`,
            html: `{!! session('html') !!}`,
            confirmButtonColor: '#2d6efd',
        });
    </script>
@endif

@if (session()->has('alert-confirm'))
    <script>
        swalCustom.fire({
            icon: `{{ session('alert-confirm') }}`,
            title: `{{ session('title') }}`,
            text: `{{ session('text') }}`,
            html: `{!! session('html') !!}`,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.value) {
                {!! session('action') !!};
                loader();
            }
        })
    </script>
@endif

@if (session()->has('toast'))
    <script>
        Toast.fire({
            icon: `{{ session('toast') }}`,
            text: `{{ session('text') }}`,
            html: `{!! session('html') !!}`,
        })
    </script>
@endif

@if ($errors->any())
<script>
    swalCustom.fire({
        icon: 'error',
        text: '{{ $errors->first() }}',
    })
</script>
@endif
