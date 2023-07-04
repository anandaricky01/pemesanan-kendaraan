@extends('dashboard.layout.layout')
@section('container')
@include('dashboard.layout.components.flashMessage')
<section id="button" class="mb-3">
    <a href="{{ route('dashboard.kendaraan_logs.index') }}" class="px-3 py-2 bg-red-600 rounded-md hover:bg-red-700 focus:ring-4 focus:ring-red-500">
        <span class="text-white">
            Back
        </span>
    </a>
</section>
<h3 id="Plat Kendaraan" class="mb-3">
    <span class="dark:text-slate-100 text-2xl">
        Detail Log Kendaraan
    </span>
</h3>
<section id="tabel-kendaraan">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Detail Kendaraan
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ID Kendaraan
                    </th>
                    <td class="px-6 py-4">
                        {{ $kendaraan->kendaraan_id }}
                    </td>
                </tr>
                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Plat Nomor
                    </th>
                    <td class="px-6 py-4">
                        {{ $kendaraan->plat }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Merk
                    </th>
                    <td class="px-6 py-4">
                        {{ $kendaraan->merk }}
                    </td>
                </tr>
                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Status
                    </th>
                    <td class="px-6 py-4">
                        @if ($kendaraan->status == 'maintenance')
                        <span class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                            {{ $kendaraan->status }}
                        </span>
                        @elseif($kendaraan->status == 'expedition')
                        <span class="bg-yellow-300 px-3 py-1 rounded text-white hover:bg-orange-400">
                            {{ $kendaraan->status }}
                        </span>
                        @else
                        <span class="bg-green-500 px-3 py-1 rounded text-white hover:bg-green-600">
                            {{ $kendaraan->status }}
                        </span>
                        @endif
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        User yang melakukan perubahan
                    </th>
                    <td class="px-6 py-4">
                        {{ $kendaraan->user_name }}
                    </td>
                </tr>
                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Aksi
                    </th>
                    <td class="px-6 py-4">
                        {{ $kendaraan->action }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Perubahan dilakukan pada
                    </th>
                    <td class="px-6 py-4">
                        {{ $kendaraan->created_at->diffForHumans() }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection
