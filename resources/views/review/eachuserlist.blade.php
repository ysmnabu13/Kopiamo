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
                    Review
                </h2>
            </div>
        </div>
    </x-slot>
    

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        @foreach ($reviews as $review)
        @if ($review->user_id === Auth::user()->id)
                    <div class="flex mb-8">
                        <a href="{{ url('add-review', $review->order_id ) }}" class="bg-green-500 hover:bg-green text-white font-bold py-2 px-4 rounded">Add Review</a>
                    </div>
         @endif   
         @endforeach
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
                                    @foreach ($reviews as $review)
                                    @if ($review->user_id === Auth::user()->id)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $review->order_id }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $review->rating }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $review->comment }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ date('h:iA, D, d/n/Y', strtotime($review->created_at)) }}
                                            </td>
                                            
                                            <td class="px-6 py-4 mt-2 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('review.show',$review->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a> 
                                                <form class="inline-block" action="{{ route('review.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="text-red-600 hover:text-red-900 mr-2 mt-4" >Delete</button>
                                                </form>
                                            </td>
                                    @endif   
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          
        </div>
    </div>
</x-app-layout>