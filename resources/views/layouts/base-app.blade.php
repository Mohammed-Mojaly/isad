<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />

    </head>
    <body class="leading-normal tracking-normal text-white">

        @include('partial.header')
             @yield('content')
        @include('partial.footer')


        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

@yield('script')
    </body>
</html>
