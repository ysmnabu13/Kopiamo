<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Orders List
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg text-white font-semibold bg-[#BE8E4B]">
                <h2>Active orders</h2>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-[#37251b]">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Total (RM)
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order status
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order details
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#37251b] divide-y divide-gray-200">
                    @foreach ($orders as $order)
                    @if ($order->orderStatus != "Completed" && $order->user_id === Auth::user()->id)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ date('D, d F Y, h:i', strtotime($order->created_at)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->totalPrice }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->orderStatus }}
                            </td>
                            <form action="{{ url('order-details', $order->id) }}" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-800">
                                    View</button>
                                </td>
                            </form>
                        </tr>
                    @elseif ($order->orderStatus != "Completed" && Auth::user()->name === 'admin')
                    <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ date('D, d F Y, h:i', strtotime($order->created_at)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->totalPrice }}
                            </td>
                            <form action="{{ route('order.show', $order->id) }}" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <select name="status">
                                        @if ($order->orderStatus == "Pending")
                                            <option value="Pending" selected>Pending</option>
                                            <option value="Pick up">Ready to pick up</option>
                                            <option value="Completed">Completed</option>
                                        @else
                                            <option value="Pending">Pending</option>
                                            <option value="Pick up" selected>Ready to pick up</option>
                                            <option value="Completed">Completed</option>
                                        @endif                                        
                                    </select>
                                    <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-800">
                                    Update</button>
                                </td>
                            </form>
                            <form action="{{ url('order-details', $order->id) }}" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-800">
                                    View</button>
                                </td>
                            </form>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div><br><br>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg font-semibold bg-gray-50">
                <h2>Completed orders</h2>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-white">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Total (RM)
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order status
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order details
                            </th>
                            @if (Auth::user()->name != 'admin')
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Action
                            </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($orders as $order)
                    @if($order->orderStatus == "Completed" && $order->user_id === Auth::user()->id)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ date('D, d F Y, h:i', strtotime($order->created_at)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->totalPrice }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->orderStatus }}
                            </td>
                            <form action="{{ url('order-details', $order->id) }}" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-800">
                                    View</button>
                                </td>
                            </form>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <a href="{{ route('review.show',$order->id) }}" class="underline text-blue-600 hover:text-blue-800">
                                Rate & Review</a>
                            </td>
                        </tr>
                    @elseif ($order->orderStatus == "Completed" && Auth::user()->name === 'admin')
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ date('D, d F Y, h:i', strtotime($order->created_at)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->totalPrice }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->orderStatus }}
                            </td>
                            <form action="{{ url('order-details', $order->id) }}" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-800">
                                    View</button>
                                </td>
                            </form>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>