<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Orders List
        </h2>
    </x-slot>
    <head>

        <script src="https://kit.fontawesome.com/c28a70ce29.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
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
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($orders as $order)
                    @if ($order->orderStatus != "Completed" && $order->user_id === Auth::user()->id)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ date('h:iA, D, d/n/Y', strtotime($order->created_at)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->totalPrice }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->orderStatus }}
                            </td>
                            <form action="{{ url('order-details', $order->id) }}" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    View</button>
                                </td>
                            </form>
                        </tr>
                    @elseif ($order->orderStatus != "Completed" && Auth::user()->name === 'admin')
                    <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ date('h:iA, D, d/n/Y', strtotime($order->created_at)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->totalPrice }}
                            </td>
                            <form action="{{ route('order.show', $order->id) }}" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <select name="status">
                                        @if ($order->orderStatus == "Pending")
                                            <option value="Pending" selected>Pending</option>
                                            <option value="Ready to pick up">Ready to pick up</option>
                                            <option value="Completed">Completed</option>
                                        @else
                                            <option value="Pending">Pending</option>
                                            <option value="Pick up" selected>Ready to pick up</option>
                                            <option value="Completed">Completed</option>
                                        @endif                                        
                                    </select>
                                    <button id="confirm_update" class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    Update</button>
                                </td>
                            </form>
                            <form action="{{ url('order-details', $order->id) }}" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    View</button>
                                </td>
                            </form>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div><br><br>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg text-white font-semibold bg-[#BE8E4B]">
                <h2>Completed orders</h2>
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
                                {{ date('h:iA, D, d/n/Y', strtotime($order->created_at)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->totalPrice }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->orderStatus }}
                            </td>
                            <form action="{{ url('order-details', $order->id) }}" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    View</button>
                                </td>
                            </form>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <a href="{{ url('add-review',$order->id)}}" class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Leave a review</a>
                            </td>
                        </tr>
                    @elseif ($order->orderStatus == "Completed" && Auth::user()->name === 'admin')
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ date('h:iA, D, d/n/Y', strtotime($order->created_at)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->totalPrice }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                {{ $order->orderStatus }}
                            </td>
                            <form action="{{ url('order-details', $order->id) }}" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
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
<script>
    //CONFIRM ORDER STATUS
    $(document).ready(function() {
  
  
      $('#confirm_update').click(function(e) {
        e.preventDefault();
        var form = e.target.form;
        form.submit();   
        swal("Order status successfully changed!", {
            icon: "success",
        });
          

      })
    })
  
  </script>