<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@%5E2/dist/tailwind.min.css" rel="stylesheet">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-white leading-tight mt-5">
                    Menu List
                </h2>
            </div>
            <form class="w-full max-w-sm" action="{{ url('/search') }}" method="GET">
                <div class="flex items-center py-2">
                  <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" name="search" type="search" placeholder="Search Menu">
                  <x-jet-button>
                    Search
                  </x-jet-button>
                </div>
            </form>
        </div>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            @auth 
                @if (Auth::user()->name === 'admin')
                    <div class="block mb-8">
                        <a href="{{ route('menu.create') }}" class="bg-green-500 hover:bg-green text-white font-bold py-2 px-4 rounded">Add Menu</a>
                    </div>
                @endif
            @endauth

            @auth
            @if (Auth::user()->name === 'admin')
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>

                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </th>
                                        <th scope="col" width="200" class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            Image
                                        </th>
                                        <th scope="col" width="200" class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            Action
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $menu->menuName }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $menu->menuDesc }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $menu->menuType }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $menu->menuPrice }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('uploads/menus/'. $menu->coffee_photo_path) }}" height="100px;" width="100px;"  alt="Image"> 
                                            </td>

                                            @auth
                                                @if (Auth::user()->name === 'admin')
                                                    <td class="px-6 py-4 mt-2 whitespace-nowrap text-sm font-medium">
                                                        <!--<a href="{{ route('menu.show', $menu->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a> -->
                                                        <a href="{{ route('menu.edit', $menu->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                                        <form class="inline-block" action="{{ route('menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="text-red-600 hover:text-red-900 mr-2 mt-4" value="Delete">
                                                        </form>
                                                    </td>
                                                {{-- @else
                                                    <td class="px-6 py-4 mt-2 whitespace-nowrap text-sm font-medium">
                                                        <form action="{{ route('order.show', $menu->id)}}" method="GET">
                                                            @csrf
                                                            <x-jet-button class="mt-4">
                                                                {{ __('Buy Now') }}
                                                            </x-jet-button>
                                                        </form>
                                                    </td> --}}
                                                @endif
                                                
                                            @endauth
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex flex-col">
                                <div class="grid grid-flow-cols grid-rows-auto grid-cols-4 gap-4">
                                    @foreach ($menus as $menu)
                                    <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                                            <!--<img src="img/carousel1.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">-->
                                            <div class="p-2">
                                                <p class="w-full min-h-40 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-50 lg:aspect-none">
                                                    <img src="{{ asset('uploads/menus/'. $menu->coffee_photo_path) }}"  alt="Image"> 
                                                </p>
                                                <br/>
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
                                            <form action="{{ route('cart.store')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                <input type="hidden" name="quantity" value="1"> 
                                                {{-- ^ TBC later --}}
                                                <x-jet-button>
                                                    {{ __('Add to Cart') }}
                                                </x-jet-button>
                                            </form>
                                    </div>
                                    @endforeach
                                </div> 
                </div>
            @endif
            @endauth

        </div>
    </div>
</x-app-layout>