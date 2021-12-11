<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Orders List
        </h2>
    </x-slot>

    <!-- <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head> -->

    <div class="container mx-auto">
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg font-semibold bg-gray-50">
                <h2>Active orders</h2>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-white">
                <a href="/tracker.blade.php">Tracking order example (id)</a><br>
                <i>List active orders (menu name, qty, price)</i>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg font-semibold bg-gray-50">
                <h2>Past orders</h2>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-white">
                <i>List past orders (menu name, qty, price)</i>
            </div>
        </div>
    </div>
</x-app-layout>