@extends('dashboard.layout.layout')
@section('container')
@include('dashboard.layout.components.flashMessage')
<section id="create-kendaraan">

    <form action="{{ route('dashboard.kendaraan.store') }}" method="post">
        @csrf
        <div class="mb-6">
            <label for="plat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan Plat Nomor Kendaraan</label>
            <input type="text" id="plat"
                name="plat"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 @error('plat') border-red-600 @enderror dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Contoh : N 4567 BAA" required>
                @error('plat')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
                @enderror
        </div>
        <div class="mb-6">
            <label for="Merk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk Kendaraan</label>
            <input type="text" id="Merk"
                name="merk"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 @error('merk') border-red-600 @enderror dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Contoh : Honda"
                required>
                @error('merk')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
                @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
            new account</button>
    </form>

</section>
@endsection
