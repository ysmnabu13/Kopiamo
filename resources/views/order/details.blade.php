<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Order Summary
        </h2>
    </x-slot>

    <div class="container mx-auto py-2">
        <div class="max mx-auto py-8 sm:px-6 lg:px-8 bg-white">
            <div class="pl-20 py-4">
                <p class="text-lg font-bold">Product details</p>
            </div>
            <div class="w-3/4 pl-20">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                        </tr>
                    </thead>
                @foreach ($orderitems as $items )
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                <img src="{{ asset('uploads/menus/'. $items->products->coffee_photo_path) }}"  alt="Image" height="80px;" width="80px;">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                {{ $items->products->menuName }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                {{ $items->qty }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                RM{{ $items->price }}
                            </td>
                        </tr>
                    </tbody>
                @endforeach
                </table>
            </div>
            @foreach ($orders as $order)
            <div class="pl-20 py-4">
                <p class="text-xl font-bold">TOTAL: RM{{ $order->totalPrice }}</p>
            </div>
            <div class="pl-20">
                <p class="text-lg"><b>Notes         : </b>{{ $order->notes }}</p>
                <p class="text-lg"><b>Order status  : </b>{{ $order->orderStatus }}</p>
                @if ($order->orderStatus == "Pending")
                    <p class="text-lg">Please wait while we are preparing your drinks ...</p>
                @elseif ($order->orderStatus == "Ready to pick up")
                    <p class="text-lg">Your drinks are ready to pick up at our store!</p>
                @else
                    <p class="text-lg">Don't forget to rate & review our drinks. We love to hear a feedback from you.</p>
                @endif
            </div>
            @if (Auth::user()->name === 'admin')
            <div class="pl-20 pt-5">
                <p class="text-lg pb-2"><b>Customer details</b<</p>
                <p class="text-lg"><b>Full Name     : </b>{{ $order->fullname }}</p>
                <p class="text-lg"><b>Email         : </b>{{ $order->email }}</p>
                <p class="text-lg"><b>Phone Number  : </b>{{ $order->phone }}</p>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</x-app-layout>