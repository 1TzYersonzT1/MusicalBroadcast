<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet" />

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css"
        integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
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

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"
        integrity="sha512-j7/1CJweOskkQiS5RD9W8zhEG9D9vpgByNGxPIqkO5KrXrwyDAroM9aQ9w8J7oRqwxGyz429hPVk/zR6IOMtSA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    @stack('modals')

    @livewireScripts
</body>

</html>
