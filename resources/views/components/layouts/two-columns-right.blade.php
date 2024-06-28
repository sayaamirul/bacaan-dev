<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components.layouts.partials.seo')

<body class="bg-base-300 font-sans antialiased" data-theme="{{ config('bacaan.theme') }}">
    @include('components.layouts.partials.navbar')
    <div class="container mx-auto min-h-screen">
        <!-- Page Content -->
        <main class="mx-auto max-w-screen-xl">
            <div class="m-4 grid grid-cols-7 gap-3 py-6">
                <div class="order-first col-span-full md:col-span-5">
                    {{ $slot }}
                </div>

                <div class="order-2 col-span-full md:col-span-2">
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
