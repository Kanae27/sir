<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <wireui:scripts />
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @livewireStyles
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">

    <x-navigation />
    <main>
        {{ $slot }}
    </main>

    <x-footer />

    @livewireScripts
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
