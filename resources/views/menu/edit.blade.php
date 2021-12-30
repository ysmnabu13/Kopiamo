<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Menu
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('menu.update', $menu->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="menuName" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="menuName" id="menuName" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('menuName', $menu->menuName) }}" />
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="menuDesc" class="block font-medium text-sm text-gray-700">Description</label>
                            <input type="text" name="menuDesc" id="menuDesc" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('menuDesc', $menu->menuDesc) }}" />
                            @error('menuDesc')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="menuType" class="block font-medium text-sm text-gray-700">Type</label>
                            <input type="text" name="menuType" id="menuType"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('menuType', $menu->menuType) }}" />
                            @error('menuType')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="menuPrice" class="block font-medium text-sm text-gray-700">Price</label>
                            <input type="text" name="menuPrice" id="menuPrice" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('menuPrice', $menu->menuPrice) }}" />
                            @error('menuPrice')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="coffee_photo_path" class="block font-medium text-sm text-gray-700">Photo</label>
                            <input type="file" name="coffee_photo_path" id="coffee_photo_path" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('coffee_photo_path', $menu->coffee_photo_path) }}" />
                            @error('coffee_photo_path')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>