@extends('dashboard.layout.layout')
@section('container')
<div class="grid grid-rows-2 gap-4">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
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
                                {{ $item->created_at }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->device->name }}
                            </td>
                            <td class="px-6 py-4">
                                <p class="bg-sky-500 rounded p-1 text-white text-center">
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
    <div class="grid grid-cols-2 gap-4">
        <div class="bg-slate-50 dark:bg-slate-700 rounded-lg border border border-gray-200 shadow-md">
            <div id="tester" class=""></div>
        </div>
        <div>

        </div>
    </div>
</div>
@include('dashboard.utils.chart')
@endsection
