<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="{{ csrf_token() }}" name="csrf-token">

    <link href="{{ url()->current() }}" rel="canonical"/>
    <meta content="{{ config('bacaan.sites.author') }}" name="author">
    <meta content="{{ $description ?? config('bacaan.sites.description') }}" name="description">
    <meta content="summary" name="twitter:card">
    <meta content="@kawankoding" name="twitter:site">
    <meta content="@kawankoding" name="twitter:creator">
    <meta content="{{ $title ?? config('bacaan.sites.title') }} | {{ config('app.name') }}" name="twitter:title">
    <meta content="https://bacaan.dev" name="twitter:url">
    <meta content="{{ $description ?? config('bacaan.sites.description') }}" name="twitter:description">
    <meta content="{{ $thumbnail ?? asset('assets/branding.jpg') }}" name="twitter:image:src">
    <meta content="{{ url()->current() }}" property="og:url">
    <meta content="{{ $title ?? config('bacaan.sites.title') }} | {{ config('app.name') }}" property="og:title"/>
    <meta content="{{ $description ?? config('bacaan.sites.description') }}" property="og:description"/>
    <meta content="{{ $thumbnail ?? asset('assets/branding.jpg') }}" property="og:image">

    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
    <title>{{ $title ?? config('bacaan.sites.title') }} - {{ config('app.name', 'Bacaan Developer') }}</title>

    <title>{{ $title }} | {{ config('app.name', 'Bacaan Developer') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $styles ?? '' }}

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T3F8W1NVG6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-T3F8W1NVG6');
    </script>
</head>
