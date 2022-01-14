<!-- DONT DELETE -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Cart
    </h2>
</x-slot>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
      #summary {
        background-color: #f6f6f6;
      }
    </style>
  </head>
  
  <body class="bg-gray-100">
    <div class="container mx-auto mt-10">
      <div class="flex shadow-md my-10">
        <div class="w-3/5 bg-white px-10 py-10">
          <div class="flex justify-between border-b pb-8">
            <h1 class="font-semibold text-2xl">Customer Details</h1>
          </div>
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
        <div id="summary" class="w-2/5 px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
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
                @csrf
                <input type="hidden" name="from" value="cartpage">
                <button type="submit" class= "bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button>
            </form>
            </div>
        </div>

      </div>
    </div>
  </body>

</x-app-layout>