<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="font-semibold leading-tight">
                {{ __('Warehouse Management System / List Pallet') }}
            </h2>
        </div>
    </x-slot>
    {{-- @dd($total_summary); --}}
    <div class="flex justify-center">
        <div class="max-w-sm p-6 mr-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white uppercase">idle</h5>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, explicabo!</p>
            <a href="#" class="inline-flex items-cente font-semibold capitalize">total : {{ $total_summary['data_idle'] }} data</a>
        </div>
    
        <div class="max-w-sm p-6 mr-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white uppercase">received</h5>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, explicabo!</p>
            <a href="#" class="inline-flex items-cente font-semibold capitalize">total : {{ $total_summary['data_reserve'] }} data</a>
        </div>
    
        <div class="max-w-sm p-6 mr-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white uppercase">occupied</h5>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, explicabo!</p>
            <a href="#" class="inline-flex items-cente font-semibold capitalize">total : {{ $total_summary['data_occupied'] }} data</a>
        </div>
    </div>

    <div class="container mx-auto p-6 grid grid-cols-2 gap-4">
        <div class="col-span-1 flex flex-col bg-white border-2 p-4">
            <h2 class="mb-2 font-bold text-2xl">
                Card Name
            </h2>
            <div class="mb-4 flex flex-wrap">
                <span class="mr-2">Link 1</span>
                <span class="mr-2">Link 2</span>
            </div>
            <p class="text-md text-justify">Some Description</p>
            <div class="flex flex-wrap mt-auto pt-3 text-xs">
                <p class="mr-2 mb-2">Tag #1</p>
                <p class="mr-2 mb-2">Tag #2</p>
            </div>
        </div>
        <div class="col-span-1 flex flex-col bg-white border-2 p-4">
            <h2 class="mb-2 font-bold text-2xl">
                Card Name
            </h2>
            <div class="mb-4 flex flex-wrap">
                <span class="mr-2">Link 1</span>
                <span class="mr-2">Link 2</span>
            </div>
            <p class="text-md text-justify">Some Description Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Maecenas vel enim lectus.</p>
            <div class="flex flex-wrap mt-auto pt-3 text-xs">
                <p class="mr-2 mb-2">Tag #1</p>
                <p class="mr-2 mb-2">Tag #2</p>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>