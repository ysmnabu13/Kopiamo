<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Review Form
        </h2>
    </x-slot>
    
    <div class="h-screen">
      <div class="w-100 mt-24 m-auto lg:mt-16 max-w-sm">
        <img src="{{ asset('uploads/menus/1cold.jfif') }}" alt=""class="rounded-t-2xl shadow-2xl lg:w-full 2xl:w-full 2xl:h-44 object-cover"/>
        <div class="bg-white shadow-2xl rounded-b-3xl">
          <h2 class="text-center text-gray-800 text-2xl font-bold pt-6">Customer Feedback</h2>
          <div class="w-5/6 m-auto">
          
            <p class="text-center text-gray-500 pt-5">Order ID: {{$orderid}}  </p>
            <p class="text-center">Orders:<br/>
              @foreach ($orderitems as $items )
              -{{ $items->products->menuName }}-<br/>
              @endforeach
              </p>       
          </div>


          <form method="post" action="{{ route('review.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="w-5/6 m-auto mt-3">
              <p class="text-center pt-5">Rate Your Order</p>
            </div>

            <input type="text" name="orderid" value={{$orderid}} hidden>
            
            <div class=" w-72 lg:w-5/6 m-auto bg-indigo-50 mt-5 p-4 lg:p-4 rounded-2xl flex flex-wrap justify-center mt-4 space-x-3">
                  <select id="rating" name="rating">
                              <option value="1" 
                      class="  flex items-center text-gray-600 hover:bg-green-500 transition duration-150 rounded-full font-bold hover:text-green-50 cursor-pointer">
                      1</option>
                              <option value="2"
                      class="  bg-gray--100 text-gray-600 hover:bg-green-500 transition duration-150 rounded-full font-bold hover:text-green-50 cursor-pointer">
                      2</option>
                              <option value="3"
                      class="  bg-gray--100 text-gray-600 hover:bg-green-500 transition duration-150 rounded-full font-bold hover:text-green-50 cursor-pointer">
                      3</option>
                              <option value="4"
                      class="  bg-gray--100 text-gray-600 hover:bg-green-500 transition duration-150 rounded-full font-bold hover:text-green-50 cursor-pointer">
                      4</option>
                              <option value="5"
                      class="  bg-gray--100 text-gray-600 hover:bg-green-500 transition duration-150 rounded-full font-bold hover:text-green-50 cursor-pointer">
                      5</option>
                  </select>
            </div>
              <div class="flex justify-center mt-4 mb-9">
                  <input name="comment" class="shadow appearance-none border rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="review" type="text" placeholder="Your Review">
              </div>
              
            <div class="bg-blue-700 w-72 lg:w-5/6 m-auto mt-2 p-2 hover:bg-indigo-500 rounded-2xl  text-white text-center shadow-xl shadow-bg-blue-700">
              <button type="submit" class="lg:text-sm text-lg font-bold">Send Review</button>
            </div>
            </br></br>
            

          </form>


        </div>
      </div>
    </div>


</x-app-layout>