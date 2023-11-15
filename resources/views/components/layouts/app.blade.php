<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components.layouts.partials.seo')

<body class="bg-base-200 font-sans antialiased" data-theme="dracula">
@include('components.layouts.partials.navbar')

<div class="container mx-auto min-h-screen">
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

{{-- Footer --}}
@include('components.layouts.partials.footer')

{{ $scripts ?? '' }}
</body>

</html>
