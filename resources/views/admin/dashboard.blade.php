<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
        *{
            font-family: "Rubik", sans-serif;
        }
    </style>
</head> -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container p-5 mx-auto">

        <h1 class="text-3xl font-normal mt-10">Selamat Datang di Admin Dashboard</h1>
        <div class="container items-center py-8 m-auto mt-5 sm:mt-10 md:mt-2">
            <div class="flex flex-wrap pb-3 bg-white divide-y rounded-sm shadow-lg xl:divide-x xl:divide-y-0">
                <div class="w-full p-2 xl:w-1/3 sm:w-1/3">
                    <div class="flex flex-col">
                        <div class="flex flex-row items-center justify-between px-4 py-4">
                            <div class="flex mr-4">
                                <span class="items-center px-4 py-4 m-auto bg-yellow-200 rounded-full hover:bg-yellow-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="items-center w-8 h-8 m-auto text-yellow-500 hover:text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                </span>
                            </div>
                            <div class="flex-1 pl-1">
                                <div class="text-4xl font-medium text-gray-600">{{ $productCount }}</div>
                                <div class="text-sm text-gray-400 sm:text-base">
                                    Jumlah Produk
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full p-2 xl:w-1/3 sm:w-1/3">
                    <div class="flex flex-col">
                        <div class="flex flex-row items-center justify-between px-4 py-4">
                            <div class="flex mr-4">
                                <span class="items-center px-4 py-4 m-auto bg-blue-200 rounded-full hover:bg-blue-300">

                                <svg xmlns="http://www.w3.org/2000/svg" class="items-center w-8 h-8 m-auto text-blue-500 hover:text-blue-600" viewBox="0 0 24 24"><path fill="currentColor" d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1m10 0h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1M10 13H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1m7 0a4 4 0 1 1-3.995 4.2L13 17l.005-.2A4 4 0 0 1 17 13"/></svg>
                                </span>
                            </div>
                            <div class="flex-1 pl-1">
                                <div class="text-4xl font-medium text-gray-600">{{ $categoryCount }}</div>
                                <div class="text-sm text-gray-400 sm:text-base">
                                    Kategori Produk
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full p-2 xl:w-1/3 sm:w-1/3">
                    <div class="flex flex-col">
                        <div class="flex flex-row items-center justify-between px-4 py-4">
                            <div class="flex mr-4">
                                <span class="items-center px-4 py-4 m-auto bg-green-200 rounded-full hover:bg-green-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="items-center w-8 h-8 m-auto text-green-500 hover:text-green-600" viewBox="0 0 16 16"><path fill="currentColor" d="M13.95 4.24C11.86 1 7.58.04 4.27 2.05C1.04 4.06 0 8.44 2.09 11.67l.17.26l-.7 2.62l2.62-.7l.26.17c1.13.61 2.36.96 3.58.96c1.31 0 2.62-.35 3.75-1.05c3.23-2.1 4.19-6.39 2.18-9.71Zm-1.83 6.74c-.35.52-.79.87-1.4.96c-.35 0-.79.17-2.53-.52c-1.48-.7-2.71-1.84-3.58-3.15c-.52-.61-.79-1.4-.87-2.19c0-.7.26-1.31.7-1.75c.17-.17.35-.26.52-.26h.44c.17 0 .35 0 .44.35c.17.44.61 1.49.61 1.58c.09.09.05.76-.35 1.14c-.22.25-.26.26-.17.44c.35.52.79 1.05 1.22 1.49c.52.44 1.05.79 1.66 1.05c.17.09.35.09.44-.09c.09-.17.52-.61.7-.79c.17-.17.26-.17.44-.09l1.4.7c.17.09.35.17.44.26c.09.26.09.61-.09.87Z"/></svg>
                                </span>
                            </div>
                            <div class="flex-1 pl-1">
                                <div class="text-4xl font-medium text-gray-600">{{ $whatsappCount }}</div>
                                <div class="text-sm text-gray-400 sm:text-base"> 
                                Nomor Whatsapp
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="mt-3">
            <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-lg">
                <thead>
                    <tr>
                        <th class="px-2 w-16 py-4 text-center border text-base font-medium">No</th>
                        <th class="px-4 w-48 py-4 text-left border text-base font-medium">Gambar Produk</th>
                        <th class="px-4 w-52 py-2 text-center border text-base font-medium">Nama Produk</th>
                        <th class="px-4 py-2 w-48 text-center border text-base font-medium">Harga</th>
                        <th class="px-4 py-2 w-55 py-4 text-center border text-base font-medium">Deskripsi</th>
                        <th class="px-4 py-2 w-52 py-4 text-center border text-base font-medium">Kategori</th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                    @forelse($products as $index => $product)
                        <tr class="border">
                            <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border text-center">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover block m-auto">
                            </td>
                            <td class="px-4 py-2 border text-center">{{ $product->name }}</td>
                            <td class="px-4 py-2 border text-center">Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 border text-center"><div class="h-16 overflow-y-auto scrollbar-none">{{ $product->description }}</div></td>
                            <td class="px-4 py-2 border text-center">{{ $product->category->name }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Tidak ada produk yang ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('admin.products.create') }}" class="w-max block mx-auto mt-9"><button class="bg-blue-500 text-white px-5 py-3 rounded-md mb-4 flex items-center gap-1">Lihat Selengkapnya <iconify-icon icon="mingcute:arrow-right-line"></iconify-icon></button></a>
        </div>
        <div class="mt-9">
            <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-lg">
                <thead>
                    <tr>
                        <th class="px-2 w-16 py-4 text-center border text-base font-medium">No</th>
                        <th class="px-4 w-52 py-4 text-left border text-base font-medium">Cover Kategori</th>
                        <th class="px-4 w-64 py-4 text-left border text-base font-medium">Nama Kategori</th>
                        <th class="px-4 w-80 py-4 text-left border text-base font-medium">Deskripsi Kategori</th>
                        <th class="px-4 w-80 py-4 text-left border text-base font-medium">Keunggulan Kategori</th>
                    </tr>
                </thead>
                <tbody  id="categoryTableBody">
                    @forelse ($categories as $index => $category)
                        <tr class="border-b border-gray-300">
                            <td class="px-2 max-w-0 py-2 text-center border text-sm">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-100 h-20 object-cover rounded">
                            </td>
                            <td class="px-4 py-2 border text-sm">{{ $category->name }}</td>
                            <td class="py-2 px-4 border text-sm"><div class="h-16 overflow-y-auto scrollbar-none">{!! $category->description !!}</div></td>
                            <td class="py-2 px-4 border text-sm"><div class="h-16 overflow-y-auto scrollbar-none">{!! $category->excellence !!}</div></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-4 py-2 text-center text-gray-500">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('admin.category.create') }}" class="w-max block mx-auto mt-9"><button class="bg-blue-500 text-white px-5 py-3 rounded-md mb-4 flex items-center gap-1">Lihat Selengkapnya <iconify-icon icon="mingcute:arrow-right-line"></iconify-icon></button></a>
        </div>
    </div>
@endsection