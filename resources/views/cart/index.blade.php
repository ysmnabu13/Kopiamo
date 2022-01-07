<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cart
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg font-semibold bg-gray-50">
                <h2>In Cart</h2>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-white">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" width="80" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                
                            </th>
                            <th scope="col" width="80" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Menu Name
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Menu Price
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Total Price
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($carts as $cart)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <img src="{{ asset('uploads/menus/'. $cart->options->photo) }}" height="75px;" width="100px;"  alt="Image"> 
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $cart->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $cart->price(2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <div class="flex justify-center">

                                    <div class="mb-3 xl:w-96">
                                        <form action={{ route('cart.update', $cart->rowId)}} method="post" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('PUT')
                                      <input
                                        type="number"
                                        class="form-control block w-20 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="cart_qty" name="cart_qty"
                                        placeholder="Number input"
                                        value={{ $cart->qty }}
                                      />
                                    </div>
                                    <div class="mb-3 xl:w-96">
                                        <button type="submit" class="text-blue-600 hover:text-blue-900 ml-2 mt-2" ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg></button>
                                        
                                    </div>
                                </form>
                                </div>

                                {{-- {{ Cart::get(1)}} --}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $cart->priceTotal() }}
                            </td>
                            <td class="px-6 py-4 mt-2 whitespace-nowrap text-sm font-medium">

                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-96">
                                        <form class="inline-block" action="{{ route('cart.destroy', $cart->rowId) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="text-red-600 hover:text-red-900 mr-2 mt-2" ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>                        
                        @endforeach  
                    </tbody>
                </table>
                <div>
                    {{-- Cart to checkout still in progress --}}
                    {{-- <form action="{{  route('order.checkout')}}" method="GET">
                        <x-jet-button>
                            {{_('Checkout')}}
                        </x-jet-button>
                    </form> --}}
                </div>
            </div><br><br>

        </div>
    </div>
</x-app-layout>
