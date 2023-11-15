<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components.layouts.partials.seo')

<body class="bg-base-200 font-sans antialiased" data-theme="dracula">
@include('components.layouts.partials.navbar')
<div class="container mx-auto min-h-screen">
    <!-- Page Content -->
    <main>
        <div class="flex flex-col md:flex-row py-6">
            <div class="order-2 w-full md:order-first md:w-1/4">
                {{ $leftSidebar ?? '' }}
            </div>

            <div class="order-first w-full md:w-2/4">
                {{ $slot }}
            </div>

            <div class="order-3 w-full md:w-1/4">
                {{ $rightSidebar ?? '' }}
            </div>
        </div>
    </main>
</div>

{{-- Footer --}}
@include('components.layouts.partials.footer')

{{ $scripts ?? '' }}
</body>

</html>
