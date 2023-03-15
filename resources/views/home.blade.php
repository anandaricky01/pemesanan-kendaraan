@extends('layout.layout')
@section('container')
<div class="mx-5 mt-5">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 lg:p-5 p-3">
        <div class="lg:col-span-2 rounded">
            <p class="font-sans text-xl font-bold dark:text-white">
                Water Level Measurment
            </p>
        </div>
        <div class="lg:col-span-2 rounded">
            <p class="font-sans font-medium text-base text-left md:text-right lg:text-right dark:text-white">
                {{ \Carbon\Carbon::parse(now())->translatedFormat('l') }}, {{
                \Carbon\Carbon::parse(now())->translatedFormat('d F Y') }}
            </p>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-6 gap-2 lg:gap-5 lg:p-5 p-3">
        <div class="lg:col-span-2 bg-slate-200 dark:bg-gray-900 rounded p-2">
            <div class="text-center">
                <p class="font-sans font-bold text-2xl dark:text-white mb-4">Ketinggian Air</p><br>
                <div class="text-center inline-block mt-3">
                    <i class="stroke-1 stroke-sky-300 fill-sky-500 w-40 h-40 animate-bounce"
                        data-feather="thumbs-up"></i>
                    {{-- <i class="stroke-1 stroke-red-300 fill-red-500 w-40 h-40 animate-bounce"
                        data-feather="thumbs-down"></i> --}}
                </div>
                <div class="transition ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 duration-700">
                    <p class="font-sans font-bold text-5xl text-sky-500">
                        Aman!</p>
                    {{-- <p class="font-sans font-bold text-5xl bg-clip-text text-transparent text-red-500">
                        Tidak Aman!</p> --}}
                </div><br>
                <p class="font-sans font-medium text-base dark:text-white">Ketinggian air aman untuk melakukan
                    kegiatan
                    memancing</p><br>
                {{-- <span class="font-sans font-medium text-sm dark:text-white">Waduh ketinggian air nya sedang tidak
                    cocok
                    untuk kegiatan memancing :(<br>silahkan datang di lain waktu!</span><br> --}}

            </div>
        </div>
        <div class="lg:col-span-4 bg-slate-200 dark:bg-gray-900 rounded p-5">
            <p class="text-center text-2xl mb-10 font-sans font-bold dark:text-white mt-3">Informasi Cuaca<br>Kabupaten Malang</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jam 00.00
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Jam 06.00
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jam 12.00
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Jam 18.00
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ \Carbon\Carbon::parse(\Carbon\Carbon::yesterday())->translatedFormat('l, d F Y') }}
                            </th>
                            <td class="px-6 py-4">
                                {{ weatherIndex($cuaca[0]['value']) }}
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                {{ weatherIndex($cuaca[1]['value']) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ weatherIndex($cuaca[2]['value']) }}
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                {{ weatherIndex($cuaca[3]['value']) }}
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                <p class="inline-flex">
                                    {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('l, d F Y') }}
                                </p>
                                <span class="relative inline-flex h-3 w-3">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                                    {{-- <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    --}}
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                                    {{-- <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span> --}}
                                </span>
                            </th>
                            <td class="px-6 py-4">
                                {{ weatherIndex($cuaca[4]['value']) }}
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                {{ weatherIndex($cuaca[5]['value']) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ weatherIndex($cuaca[6]['value']) }}
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                {{ weatherIndex($cuaca[7]['value']) }}
                            </td>
                        </tr>
                        <tr class="border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ \Carbon\Carbon::parse(\Carbon\Carbon::tomorrow())->translatedFormat('l, d F Y') }}
                            </th>
                            <td class="px-6 py-4">
                                {{ weatherIndex($cuaca[8]['value']) }}
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                {{ weatherIndex($cuaca[9]['value']) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ weatherIndex($cuaca[10]['value']) }}
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                {{ weatherIndex($cuaca[11]['value']) }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <p class="font-sans font-medium text-sm text-gray-500 dark:text-gray-700 mt-3">
                (sumber data : https://data.bmkg.go.id)
            </p>
        </div>
    </div>
</div>
@endsection
