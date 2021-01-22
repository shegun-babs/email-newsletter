<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="py-2 text-xs lg:text-sm w-full bg-blue-800 text-white flex flex-row items-center justify-between space-x-5 px-6 lg:px-20">
            <div class="flex items-center">
                <span>
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd"></path></svg>
                </span>
                <span class="hidden lg:block font-semibold uppercase">Email<br>Newsletter</span>
            </div>
            <div class="flex space-x-5 font-semibold">
                <a href="#" class="py-3 text-sm lg:text-base">Subscribe</a>
                <a href="#" class="py-3 text-sm lg:text-base">Unsubscribe</a>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
