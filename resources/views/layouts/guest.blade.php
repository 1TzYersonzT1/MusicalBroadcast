<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MusicBroadcast') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/extra.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://apis.google.com/js/platform.js"></script>
    @livewireStyles
</head>

<body  class="bg-fixed bg-center bg-cover bg-no-repeat"
style="background-image:linear-gradient(rgba(0, 0, 0, 0), rgba(0, 52, 89, 0.9)), url('Fondo.png')">
    <div 
        class="font-sans antialiased">
        @livewire('navigation-menu')
        @yield("contenido")
        @include("footer")
    </div>

    @livewireScripts
</body>

</html>
