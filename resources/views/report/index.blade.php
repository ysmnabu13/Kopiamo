<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Report
        </h2>
    </x-slot>

    <div class="container mx-auto py-2">
        <div class="max mx-auto py-8 sm:px-6 lg:px-8 bg-white">
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg text-center text-white font-semibold bg-[#BE8E4B]">
                <p class="font-bold text-2xl">Sales Report</p>
            </div>
            
            <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-[#37251b]">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>

                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Menu ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Menu
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Sales (Cups)
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Revenue (RM)
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($menus as $report)
                                        <tr>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900">
                                                {{ $report->id}}
                                            </td> 

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900">
                                                {{ $report->menuName}}
                                            </td> 
                                            <?php $total=0 ?>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900">
                                                @foreach ($items as $item)
                                                    @if ((($item->prod_id)==($report->id)))
                                                        <?php $total+=($item->qty) ?>
                                                    @endif
                                                @endforeach
                                                {{ $total }}
                                            </td>
                                            <?php $revenue=0 ?>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900">
                                                @foreach ($items as $item)
                                                    @if ((($item->prod_id)==($report->id)))
                                                        <?php $revenue+=($item->price) ?>
                                                    @endif
                                                @endforeach
                                                <?php echo number_format($revenue,2) ?>
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

            <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-[#37251b]">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <?php $cumulative=0 ?>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900">
                                                @foreach ($items as $item)
                                                    @if (($item->price)!=0)
                                                        <?php $cumulative+=($item->price) ?>
                                                    @endif
                                                @endforeach
                                                Total Sales: RM <?php echo number_format($cumulative,2) ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>