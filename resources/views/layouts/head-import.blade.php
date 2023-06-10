<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- AlpineJS -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs/dist/cdn.min.js"></script>
<!-- NProgress -->
<script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
<link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet">
<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Theme -->
@php
    $theme = App\Models\Theme::select('source')
        ->where('name', auth()->user()->theme ?? 'default')
        ->first();
@endphp
<link id="theme-import" href="{{ $theme->source }}" rel="stylesheet" />
<!-- Tabler Icons -->
<link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">
<!--Animation-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
<!-- Custom CSS -->
<link href="/css/main.css" rel="stylesheet">
