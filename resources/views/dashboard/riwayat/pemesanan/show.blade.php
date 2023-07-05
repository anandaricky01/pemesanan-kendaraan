@extends('dashboard.layout.layout')
@section('container')
@include('dashboard.layout.components.flashMessage')

<section id="button" class="mb-3">
    <a href="{{ route('dashboard.riwayat.pemesanan.index') }}" class="px-3 py-2 bg-red-600 rounded-md hover:bg-red-700 focus:ring-4 focus:ring-red-500">
        <span class="text-white">
            Back
        </span>
    </a>
</section>

<section id="title">
    <p class="font-bold text-2xl dark:text-slate-100">
        Detail Riwayat Pemesanan
    </p>
</section>

<section id="form-pemesanan" class="mt-3">
        <div class="mb-6">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Kendaraan
            </label>
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly value="{{ $pemesanan->kendaraan }}">
            {{-- <input type="hidden" name="kendaraan_id" value="{{ $pemesanan->kendaraan_id }}"> --}}
        </div>
        <div class="mb-6">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Pengelola
            </label>
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly value="{{ $pemesanan->user_name }}">
            {{-- <input type="hidden" name="user_id" value="{{ $pemesanan->user_id }}"> --}}
        </div>
        <div class="mb-6">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Destinasi
            </label>
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly value="{{ $pemesanan->destinasi }}">
            {{-- <input type="hidden" name="destinasi_id" value="{{ $pemesanan->destinasi_id }}"> --}}
        </div>
        <div class="mb-6">
            <label for="steps-range" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Perkiraan Penggunaan BBM
            </label>
            <input disabled id="steps-range" type="range" min="0" max="100" value="{{ $pemesanan->bbm }}" step="0.1"
                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                <input type="hidden" name="bbm" value="{{ $pemesanan->bbm }}">
                <div class="text-gray-500 dark:text-gray-400">
                    <span id="range-value" class="">{{ $pemesanan->bbm }}</span> Liter
                </div>
        </div>
        <div class="mb-6">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Tanggal penggunaan
            </label>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
            <div inline-datepicker datepicker-format="yyyy-mm-dd" data-date="{{ $pemesanan->tanggal }}"></div>

            {{-- <input type="hidden" name="tanggal" value="{{ $pemesanan->tanggal }}"> --}}
        </div>
</section>

@endsection
