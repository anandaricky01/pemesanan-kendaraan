@extends('dashboard.layout.layout')
@section('container')

    <section id="data-rekap" class="mb-5 grid grid-cols-3 gap-4">
        <div id="data-tertinggi" class="col-span-3 md:col-span-1">
            <div class="grid grid-cols-3 bg-slate-50 p-3 dark:bg-slate-700 rounded-lg border border-gray-200 shadow-md">
                <div class="bg-red-500 rounded-full p-3 justify-self-center self-center">
                    <i data-feather="trending-up" class="stroke-white"></i>
                </div>
                <div class="col-span-2">
                    <div class="grid grid-rows-2 p-2">
                        <p class="text-base font-medium dark:text-white">Data Tertinggi</p>
                        <p class="text-xl font-bold dark:text-white">{{ 29 - $data_rekap['data_tertinggi'] < 0 ? 'Turun ' . -1*(29 - $data_rekap['data_tertinggi']) . ' cm' : 'Naik ' . 29 - $data_rekap['data_tertinggi'] . ' cm'}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="data-terendah" class="col-span-3 md:col-span-1">
            <div class="grid grid-cols-3 bg-slate-50 p-3 dark:bg-slate-700 rounded-lg border border-gray-200 shadow-md">
                <div class="bg-emerald-500 rounded-full p-3 justify-self-center self-center">
                    <i data-feather="trending-down" class="stroke-white"></i>
                </div>
                <div class="col-span-2">
                    <div class="grid grid-rows-2 p-2">
                        <p class="text-base font-medium dark:text-white">Data Terendah</p>
                        <p class="text-xl font-bold dark:text-white">{{ 29 - $data_rekap['data_terendah'] < 0 ? 'Turun ' . -1*(29 - $data_rekap['data_terendah']) . ' cm' : 'Naik ' . 29 - $data_rekap['data_terendah'] . ' cm'}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="tinggi-rata-rata" class="col-span-3 md:col-span-1">
            <div class="grid grid-cols-3 bg-slate-50 p-3 dark:bg-slate-700 rounded-lg border border-gray-200 shadow-md">
                <div class="bg-yellow-300 rounded-full p-3 justify-self-center self-center">
                    <i data-feather="bar-chart-2" class="stroke-white"></i>
                </div>
                <div class="col-span-2">
                    <div class="grid grid-rows-2 p-2">
                        <p class="text-base font-medium dark:text-white">Tinggi rata - rata</p>
                        <p class="text-xl font-bold dark:text-white">{{ 29 - $data_rekap['data_rata_rata'] < 0 ? 'Turun ' . -1*(29 - $data_rekap['data_rata_rata']) . ' cm' : 'Naik ' . 29 - $data_rekap['data_rata_rata'] . ' cm'}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="data-baru" class="mb-5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-slate-50 dark:text-white dark:bg-gray-800">
                    Data Baru Masuk
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Data baru akan masuk setiap 5 detik sekali</p>
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
                                    {{ 29 - $item->data > 0 ? 'Naik ' . 29 - $item->data . ' cm' : 'Turun ' . -1*(29 - $item->data) . ' cm' }}
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
    </section>

    <section id="data-record">
        <div class="bg-slate-50 dark:bg-slate-700 rounded-lg border border-gray-200 shadow-md">
            <div id="tester" class=""></div>
        </div>
    </section>
@include('dashboard.utils.chart')
@endsection
