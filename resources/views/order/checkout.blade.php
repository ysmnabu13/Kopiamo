<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Checkout
        </h2>
    </x-slot>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="container p-12 mx-auto">
            <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
                <div class="flex flex-col md:w-full pl-20">
                    <h2 class="mb-4 font-bold md:text-xl text-heading">Customer details
                    </h2>
                    <form class="justify-center w-full mx-auto" method="post" action="{{  route('order.store') }}">
                        @csrf
                        @auth
                        <div>
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full">
                                    <label for="fullName" class="block mb-3 text-sm font-semibold text-gray-500">Full Name</label> 
                                    <input name="fullName" type="text" value="{{Auth::user()->name}}"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                        required>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="space-x-0 lg:flex lg:space-x-4">
                                    <div class="w-full lg:w-1/2">
                                        <label for="Email" class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                                        <input name="Email" type="email" value="{{Auth::user()->email}}"
                                            class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                            required>
                                    </div>
                                    <div class="w-full lg:w-1/2 ">
                                        <label for="phoneNumber" class="block mb-3 text-sm font-semibold text-gray-500">Phone Number</label>
                                        <input name="phoneNumber" type="text" value="{{Auth::user()->phonenum}}"
                                            class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    </div>
                                </div>
                            </div>
                        @endauth
                            <div class="relative pt-3 xl:pt-6"><label for="note"
                                    class="block mb-3 text-sm font-semibold text-gray-500"> Notes
                                    (Optional)</label><textarea name="note"
                                    class="flex items-center w-full px-4 py-3 text-sm border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    rows="4" placeholder="Notes for takeout"></textarea>
                            </div>
                        </div>
                </div>
                <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5 md:ml-12">
                    <div class="pt-12 md:pt-0 2xl:ps-4">
                        <h2 class="text-xl font-bold">Order Summary
                        </h2>
                        @foreach ($menus as $menu)
                        <div class="mt-8">
                            <div class="flex flex-col space-y-4">
                                <div class="flex space-x-4">
                                    <div>
                                        <img src="{{ asset('uploads/menus/'. $menu->coffee_photo_path) }}"  alt="Image" height="100px;" width="100px;">
                                    </div>
                                    <div>
                                        <input name="prodID" value="{{ $menu->id }}" hidden>
                                        <input name="qty" value="1" hidden>
                                        <h2 class="text-xl font-bold">{{ $menu->menuName }}</h2>
                                        <p class="text-sm"><b>Coffee Type: </b>{{ $menu->menuType }}</p>
                                        <p class="text-sm"><b>Quantity: </b>1</p>
                                        <span class="text-red-600">Price</span> RM {{ $menu->menuPrice}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input name="total" value="{{ $menu->menuPrice }}" hidden>
                        <div
                            class="flex items-center w-full py-4 text-sm font-semibold border-t border-gray-300 lg:py-5 text-heading text-xl last:border-b-0 last:text-base last:pb-0">
                            TOTAL<span class="ml-2" id="sum">RM {{ $menu->menuPrice }}</span></div>
                        @endforeach
                        <div>
                            <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-800">
                            Place order</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </body>

</x-app-layout>