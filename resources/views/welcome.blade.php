<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased bg-gray-100">
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
        <div class="flex itens-center justify-center px-6 lg:px-16 py-10 lg:py-20">
            <h3 class="text-2xl text-gray-800 font-semibold">Feel free to Subscribe to our newsletter</h3>
        </div>
        <div class="flex items-center justify-center">
            <form class="w-1/2 relative" id="subscribe-form">

                <div class="p-6 grid grid-cols-6 gap-6">
                    <div class="col-span-3">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                        <input type="text" name="firstname" id="firstname"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm
                               sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-3">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                        <input type="text" name="lastname" id="lastname"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm
                               sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" name="email" id="email"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm
                               sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-1">
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm
                                text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
                <div class="hidden loading absolute z-50 inset-0 w-full bg-gray-400 rounded bg-opacity-75">
                    <div class="flex items-center justify-center h-full">
                        <svg class="w-8 h-8 text-blue-800" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="50" cy="50" fill="none" stroke="currentColor" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                            </circle>
                        </svg>
                    </div>
                </div>
            </form>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <script>





        </script>
    </body>
</html>
