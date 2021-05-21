<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>

<body class="font-sans antialiased bg-primary">

    <x-jet-banner />

    <div class="min-h-screen">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="mix-blend-normal lg:mx-auto">
            {{ $slot }}
        </main>

    </div>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        window.addEventListener('onContentChanged', () => {
            initializeSwiper();
        });



        function initializeSwiper() {

            var mySwiper = new Swiper('.mySwiper', {
                loop: false,
                slidesPerView: 'auto',
                observer: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },


            });
        }
        window.onload = function() {
            initializeSwiper();
        }

    </script>

    @stack('modals')

    @livewireScripts
</body>

</html>
