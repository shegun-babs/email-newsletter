@extends('layouts.app')

@section('content')

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

@endsection
