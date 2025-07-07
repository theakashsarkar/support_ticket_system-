@extends('layouts.auth')

@section('content')
    <div
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 mt-12 mr-12 ml-12"
    >
        <div
                class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between"
        >
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    Support Ticket system
                </h3>
            </div>

            <div class="flex items-center gap-2">
                <form class="">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                        dark:focus:border-blue-500 pr-8 pl-8" >
                        <button type="submit" class="text-white cursor-pointer absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-0.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>

                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200"
                >
                    Add Ticket
                </button>
            </div>
        </div>

        <div class="w-full overflow-x-auto">
            <table class="min-w-full">
                <thead x-data="{ headers: ['Products', 'Category', 'Price', 'Status'] }">
                    <tr class="border-y border-gray-100 dark:border-gray-800">
                        <template x-for="header in headers" :key = "header">
                            <th class="py-3 text-left">
                                <div class="flex items-center">
                                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400" x-text = "header"></p>
                                </div>
                            </th>
                        </template>
                    </tr>
                </thead>
                <!-- table header end -->

                <tbody class="divide-y divide-gray-100 dark:divide-gray-800"
                    x-data="{
                        rows: [
                            {product: 'Macbook pro 13', category:'Laptop',price:'$2399.00', status:'Delivered'}
                        ]
                    }"
                >
                <template x-for="row in rows" :key="row.products">
                <tr>
                    <td class="py-3">
                        <div class="flex items-center">
                            <div class="flex items-center gap-3">
                                <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                                    <img src="./images/product/product-01.jpg" alt="Product" />
                                </div>
                                <div>
                                    <p
                                            class="font-medium text-gray-800 text-theme-sm dark:text-white/90"
                                            x-text="row.product"
                                    >
                                    </p>
                                    <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                    2 Variants
                  </span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400" x-text="row.category"></p>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400" x-text="row.price"></p>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="rounded-full bg-green-50 px-2 py-0.5 text-xs font-medium text-green-600 dark:bg-green-500/15 dark:text-green-500" x-text="row.status"></p>
                        </div>
                    </td>

                </tr>
                </template>
                </tbody>
            </table>
        </div>
    </div>

@endsection


