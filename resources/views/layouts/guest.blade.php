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
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    @livewireStyles
</head>

<body  class="relative bg-fixed bg-center bg-cover bg-no-repeat"
style="background-image:linear-gradient(rgba(135, 80, 156, 0.9), rgba(135, 80, 156, 0.9)), url('Fondo.png')">
    <div 
        class="font-sans bg-gray-900 antialiased">
        @livewire('navigation-menu')
        {{ $slot }}
        @include("footer")
    </div>

    @livewireScripts
</body>

</html>
