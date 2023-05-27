@extends('dashboard.layout.layout')
@section('container')
<div class="grid grid-cols-2 gap-4">
    <div class="col-span-2 relative overflow-x-auto shadow-md sm:rounded-lg border">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-slate-50 dark:text-white dark:bg-gray-800">
                Data Baru Masuk
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Data baru akan masuk setiap 1 jam sekali</p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tinggi Air
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Device
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($sensor_tabel->count() > 0)
                    @foreach ($sensor_tabel->take(5) as $item)
                        <tr class="bg-slate-50 border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->data }} Centimeter
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->device->name }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->device->status == 'active')
                                    <p class="bg-sky-500 rounded p-1 text-white text-center">
                                @elseif($item->device->status == 'maintenance')
                                    <p class="bg-yellow-300 rounded p-1 text-white text-center">
                                @else
                                    <p class="bg-red-500 rounded p-1 text-white text-center">
                                @endif
                                    {{ $item->device->status }}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                @else
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" colspan='6' class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Belum ada data Masuk
                    </th>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="col-span-2 grid grid-cols-2 gap-4">
        <div class="md:col-span-1 sm:col-span-2 max-[400px]:col-span-2 min-[320px]:col-span-2 bg-slate-50 dark:bg-slate-700 rounded-lg border border border-gray-200 shadow-md">
            <div id="tester" class=""></div>
        </div>
        <div class="md:col-span-1 sm:col-span-2 max-[400px]:col-span-2 min-[320px]:col-span-2 relative overflow-x-auto shadow-md sm:rounded-lg border">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-slate-50 dark:text-white dark:bg-gray-800">
                    Data Pengunjung Baru
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Data pengunjung yang mengakses web water level measurement</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            IP Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Agent (Browser)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($visitors->count() > 0)
                        @foreach ($visitors->take(5) as $visitor)
                            <tr class="bg-slate-50 border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $visitor->ip_address }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ Str::limit($visitor->user_agent,10) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($visitor->created_at)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" colspan='3' class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Belum ada data Masuk
                        </th>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('dashboard.utils.chart')
@endsection
