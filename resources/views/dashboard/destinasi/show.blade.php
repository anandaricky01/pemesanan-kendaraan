@extends('dashboard.layout.layout')
@section('container')
@include('dashboard.layout.components.flashMessage')
<section id="button" class="mb-3">
    <a href="{{ route('dashboard.destinasi.index') }}" class="px-3 py-2 bg-red-600 rounded-md hover:bg-red-700 focus:ring-4 focus:ring-red-500">
        <span class="text-white">
            Back
        </span>
    </a>
</section>
<h3 id="Plat Kendaraan" class="mb-3">
    <span class="dark:text-slate-100 text-2xl">
        Detail Destinasi
    </span>
</h3>
<section id="tabel-kendaraan">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Detail Destinasi
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ID Destinasi
                    </th>
                    <td class="px-6 py-4">
                        {{ $destinasi->id }}
                    </td>
                </tr>
                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Destinasi
                    </th>
                    <td class="px-6 py-4">
                        {{ $destinasi->destinasi }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Alamat
                    </th>
                    <td class="px-6 py-4">
                        {{ $destinasi->alamat }}
                    </td>
                </tr>
                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Deskripsi
                    </th>
                    <td class="px-6 py-4">
                        {{ $destinasi->deskripsi }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

@endsection
