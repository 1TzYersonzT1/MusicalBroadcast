<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />

    <link rel="stylesheet" href="{{ mix('css/extra.css') }}" />
</head>

<body class="font-sans antialiased bg-gradient-to-b bg-primary">

    <x-jet-banner />

    <div class="min-h-screen flex flex-col">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl container mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="mix-blend-normal container mx-auto">
            {{ $slot }}
        </main>

        @include('footer')
    </div>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Inicializar swiper talleres -->
    <script>
        var mySwiper = {};

        function initializeSwiper(slideActual) {
            mySwiper = new Swiper('.mySwiper', {
                loop: false,
                slidesPerView: 'auto',
                spaceBetween: 30,
                observer: true,
                initialSlide: slideActual,
            });
        }

        window.addEventListener('onContentChanged', (event) => {
            initializeSwiper(event.detail.slideActual);
        });

        window.onload = function() {
            initializeSwiper(0);
        }

    </script>

    @stack('modals')

    @livewireScripts
</body>

</html>
