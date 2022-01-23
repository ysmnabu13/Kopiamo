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
                    Review Details
                </h2>
            </div>
        </div>
    </x-slot>
                <div class="flex flex-wrap place-items-center h-4/6">
                    <!-- card -->
                    <div class="overflow-hidden shadow-lg transition duration-500 ease-in-out transform hover:-translate-y-5 hover:shadow-2xl rounded-lg h-90 w-200 md:w-200 cursor-pointer m-auto">
                        
                            <div class="bg-white w-full p-4">
                                <p class="text-indigo-500 text-2xl font-medium">
                                    Should You Get Online Education?
                                </p>
                                <p class="text-gray-800 text-sm font-medium mb-2">
                                    A comprehensive guide about online education.
                                </p>
                                <p class="text-gray-600 font-light text-md">
                                    It is difficult to believe that we have become so used to having instant access to information at...
                                    <a class="inline-flex text-indigo-500" href="#">Read More</a>
                                </p>
                                <div class="flex flex-wrap justify-starts items-center py-3 border-b-2 text-xs text-white font-medium">
                                    <span class="m-1 px-2 py-1 rounded bg-indigo-500">
                                        #online
                                    </span>
                                    <span class="m-1 px-2 py-1 rounded bg-indigo-500">
                                        #internet
                                    </span>
                                    <span class="m-1 px-2 py-1 rounded bg-indigo-500">
                                        #education
                                    </span>
                                </div>
                                <div class="flex items-center mt-2">
                                    <img class='w-10 h-10 object-cover rounded-full' src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                        
                                    <div class="pl-3">
                                        <div class="font-medium">
                                            Jean Marc
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                </div>

</x-app-layout>