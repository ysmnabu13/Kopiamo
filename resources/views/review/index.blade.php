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
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-5">
                    Review List
                </h2>
            </div>
            <form class="w-full max-w-sm" action="{{ url('/search') }}" method="GET">
                <div class="flex items-center border-b border-teal-500 py-2">
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
                    <div class="flex mb-8">
                        <a href="{{ route('review.create') }}" class="bg-green-500 hover:bg-green text-white font-bold py-2 px-4 rounded">Add Review</a>
                    </div>
            
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>

                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Review ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Rating (/5)
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Message
                                        </th>
                                        <th scope="col" width="200" class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                        Time and Date
                                        </th>
                                        @auth
                                          @if (Auth::user()->name !== 'admin')
                                        <th scope="col" width="200" class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            Action
                                        </th>
                                          @endif
                                        @endauth
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <!--@foreach ($reviews as $review)-->
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                Order 1
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                22-10-2021 14:33:12
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                RM12
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                2
                                            </td>
                                            
                                            @auth
                                                @if (Auth::user()->name !== 'admin')
                                                    <td class="px-6 py-4 mt-2 whitespace-nowrap text-sm font-medium">
                                                        <a href="{{ route('review.show',$review->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a> 
                                                        <form class="inline-block" action="{{ route('review.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="text-red-600 hover:text-red-900 mr-2 mt-4" >Delete</button>
                                                        </form>
                                                    </td>
                                                @endif   
                                            @endauth
                                        </tr>
                                   <!-- @endforeach-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          
        </div>
    </div>
</x-app-layout>