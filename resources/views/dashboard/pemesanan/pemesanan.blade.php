@extends('dashboard.layout.layout')
@section('container')
@include('dashboard.layout.components.flashMessage')

<section id="title">
    <p class="font-bold text-2xl dark:text-slate-100">
        Pemesanan Kendaraan
    </p>
</section>

<section id="form-pemesanan" class="mt-3">
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2 md:col-span-1 md:hidden">
            <div class="p-3 bg-sky-100 dark:bg-slate-600 rounded-lg">
                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Tata cara pemesanan:</h2>
                <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                    <li>
                        Setelah dipesan, data tidak bisa dirubah.
                    </li>
                    <li>
                        Lorem ipsum dolor sit.
                    </li>
                    <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing.
                    </li>
                    <li>
                        Lorem, ipsum dolor.
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-span-2 md:col-span-1">
            <form method="post" action="{{ route('dashboard.pemesanan.pemesananPost') }}">
                @csrf
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pilih Kendaraan (ID - Plat Nomor)
                    </label>
                    <select name="kendaraan_id" id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($kendaraan as $ken)
                        <option value="{{ $ken->id }}">{{ $ken->id }} - {{ $ken->plat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pilih Pengelola
                    </label>
                    <select name="user_id" id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($user->sortBy('name') as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pilih Destinasi
                    </label>
                    <select name="destinasi_id" id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($destinasi->sortBy('destinasi') as $item)
                        <option value="{{ $item->id }}">{{ $item->destinasi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="steps-range" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Perkiraan Penggunaan BBM
                    </label>
                    <input name="bbm" id="steps-range" type="range" min="0" max="100" value="50" step="0.1"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        <div class="text-gray-500 dark:text-gray-400">
                            <span id="range-value" class="">50</span> Liter
                        </div>

                    <script>
                        const rangeInput = document.getElementById('steps-range');
                        const rangeValue = document.getElementById('range-value');

                        rangeInput.addEventListener('input', function() {
                            rangeValue.textContent = this.value;
                        });
                    </script>

                </div>
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tanggal penggunaan
                    </label>
                    @include('dashboard.layout.components.datePicker')
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Tambah Pemesanan
                </button>
            </form>
        </div>
        <div class="col-span-2 md:col-span-1 invisible md:visible">
            <div class="p-3 bg-sky-100 dark:bg-slate-600 rounded-lg">
                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Tata cara pemesanan:</h2>
                <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                    <li>
                        Setelah dipesan, data tidak bisa dirubah.
                    </li>
                    <li>
                        Lorem ipsum dolor sit.
                    </li>
                    <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing.
                    </li>
                    <li>
                        Lorem, ipsum dolor.
                    </li>
                </ul>
            </div>
        </div>
    </div>


</section>

@endsection
