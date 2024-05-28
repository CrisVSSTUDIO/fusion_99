<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Asset manager for your virtual needs.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('assets\icon\logo_icon_tab.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('assets\css\extra.css') }}" rel="stylesheet">
<style>

/* info */

</style>

</head>

<body>
    <main>
        <x-navbar :categories="$categories ?? ''"></x-navbar>
        <div class="container mt-4 py-4">
            @if (!empty($__env->yieldContent('content')))
            @yield('content')
            @else
            @include('info.info')
            @endif
            <x-create-ticket />

            <x-dark-toggle />
        </div>
        <x-footer />
        <x-scroll-top />
    </main>
    <!--  <script src="{{ asset('assets\js\botman.js') }}"></script>
    <script>
        var botmanWidget = {
            aboutText: 'Write Something',
            introMessage: "✋ Boas!, sou o Botman. Estou aqui para ajudar!"
        };
    </script> -->

</body>

</html>