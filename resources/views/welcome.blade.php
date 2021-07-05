<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MusicBroadcast</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">


    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/extra.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @livewireStyles
</head>

<body class="antialiased bg-primary font-body">

    <div class="min-h-screen max-h-screen flex flex-col justify-between">
        @livewire('navigation-menu')
        
        @include('banner')
        @include('novedades')

        @include('footer')
    </div>

    @livewireScripts

</body>

</html>
