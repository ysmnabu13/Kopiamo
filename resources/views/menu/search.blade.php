<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@%5E2/dist/tailwind.min.css" rel="stylesheet">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4">
                Menu List
            </h2>
            <form class="form-inline my-2 my-lg-0" action="{{ url('/search') }}" method="GET">
                <input type="search" class="form-control mr-sm-2" name="search" placeholder="Search Menu">
                <x-jet-button class="mt-4">
                    Search
                </x-jet-button>
            </form>
        </div>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="grid grid-flow-cols grid-rows-auto grid-cols-4 gap-4">
                    @foreach ($menus as $menu)
                    <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                            <!--<img src="img/carousel1.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">-->
                            <div class="p-2">
                                <h2 class="font-bold test-lg mb-2">{{ $menu->menuName }}</h2>
                                <p class="text-sm text-gray-600">{{ $menu->menuDesc }}<p>
                                <p class="text-sm text-gray-600">{{ $menu->menuType }}<p>
                                <p class="text-sm text-gray-600">RM {{ $menu->menuPrice }}<p>
                            </div>
                            <form action="{{ route('order.show', $menu->id)}}" method="GET">
                                @csrf
                                <x-jet-button class="mt-4">
                                    {{ __('Buy Now') }}
                                </x-jet-button>
                            </form>
                    </div>
                    @endforeach
                </div> 
            </div>

        </div>
    </div>
</x-app-layout>