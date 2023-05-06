@if (session()->has('alert'))
    <script>
        Swal.fire({
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
        Swal.fire({
            icon: `{{ session('alert-confirm') }}`,
            title: `{{ session('title') }}`,
            text: `{{ session('text') }}`,
            html: `{!! session('html') !!}`,
            showCancelButton: true,
            cancelButtonColor: '#dc3545',
            confirmButtonColor: '#0d6efd',
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
