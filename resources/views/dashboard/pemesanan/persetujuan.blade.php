@extends('dashboard.layout.layout')
@section('container')
@include('dashboard.layout.components.flashMessage')
<section id="search-bar">
    <form method="get" action="{{ route('dashboard.kendaraan.index') }}">
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="search" placeholder="Cari judul kendaraan..." value="{{ request('search')}}">

            <button type="submit"
                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
        </div>
    </form>
</section>
<section id="tabel-kendaraan" class="mt-3">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption
                class="relative p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">

                <p>
                    Daftar Ekspedisi yang perlu persetujuan
                </p>
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                    Pengiriman kendaraan perlu disetujui pengelola yang bertanggung jawab sebelum melakukan ekspedisi
                </p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Plat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pengelola
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destinasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status Pemesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($pemesanan->where('user_id', auth()->user()->id)->count() > 0)
                @foreach ($pemesanan->where('user_id', auth()->user()->id) as $pem)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pem->kendaraan->plat }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $pem->user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pem->destinasi->destinasi }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($pem->status == 'accept')
                        <span class="bg-green-500 px-3 py-1 rounded text-white hover:bg-green-600">
                            {{ $pem->status }}
                        </span>
                        @elseif($pem->status == 'decline')
                        <span class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                            {{ $pem->status }}
                        </span>
                        @else
                        <span class="bg-yellow-300 px-3 py-1 rounded text-white hover:bg-orange-400">
                            {{ $pem->status }}
                        </span>
                        @endif
                    </td>
                    <td>
                        @if ($pem->status != 'pending')
                            <button
                            disabled
                            class="font-medium text-white bg-blue-300 hover:bg-blue-400 px-2 rounded">
                                Lihat
                            </button>
                        @else
                            <a href="{{ route('dashboard.pemesanan.detail_persetujuan', $pem->id) }}">
                                <button
                                    class="font-medium text-white bg-blue-500 hover:bg-blue-700 px-2 rounded">
                                    Lihat
                                </button>
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td colspan="4" class="text-center px-3 py-2">
                        <span class="dark:text-slate-100">
                            Daftar Pemesanan Kosong
                        </span>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</section>
<div class="mt-5 text-center">
    {{ $pemesanan->links('pagination::tailwind') }}
</div>
@endsection
