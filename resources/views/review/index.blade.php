<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@%5E2/dist/tailwind.min.css" rel="stylesheet">
</head>



<x-app-layout>
@auth
    @if (Auth::user()->name === 'admin')
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-white leading-tight mt-5">
                    Review and Rating 
                </h2>
            </div>
        </div>
    </x-slot>
    


    
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>

                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            User ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            OrderID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Rating
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Review
                                        </th>
                                        <th scope="col" width="200" class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            Action
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $review->user_id }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $review->order_id }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $review->rating }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $review->comment }}
                                            </td>   
                                            
                                            <td class="px-6 py-4 mt-2 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('review.show', $review->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                                <!--<form class="inline-block" action="{{ route('review.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="text-red-600 hover:text-red-900 mr-2 mt-4" >Delete</button>-->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
                @else
                <div class="lg:px-24 lg:py-24 md:py-20 md:px-44 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
            <div class="xl:pt-24 w-screen xl:w-1/4 relative pb-12 lg:pb-0">
                <div class="relative">
                    <div >
                        <div class="">
                            <h1 class="z-30 my-2 text-gray-800 font-bold text-2xl">
                                Looks like you've already sent your
                                review
                            </h1>
                            <p class="z-20 my-2 text-gray-800">Big thanks and kudos to you!!</p><br/><br/><br/>
                            <a href="{{ url()->previous() }}" class=" sm:w-full lg:w-auto my-2 border rounded md py-4 px-8 text-center bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-opacity-50">Sure! Alright,bring me back!</a>
                        </div>
                    </div>
                   <!-- <div>
                        <img src="{{ asset('uploads/menus/'.'love.png') }}" width="400px" height="400px" style="opacity:0.2" class="-z-10"/>
                    </div>-->
                </div>
            </div>
            <div>
                <img src="{{ asset('uploads/menus/'.'review.png') }}" width="500px" height="30px"/>
            </div>
        </div>
                    
        
        @endif  
        @endauth                                                                       

</x-app-layout>
    




    