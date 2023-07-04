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
<section id="create-kendaraan">
    <p class="dark:text-slate-100 font-bold text-2xl mb-5">
        Edit Destinasi
    </p>
    <form action="{{ route('dashboard.destinasi.update', $destinasi->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-6">
            <label for="destinasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan Destinasi</label>
            <input type="text" id="destinasi"
                name="destinasi"
                value="{{ $destinasi->destinasi }}"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 @error('destinasi') border-red-600 @enderror dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required>
                @error('destinasi')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
                @enderror
        </div>
        <div class="mb-6">
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan Alamat</label>
            <input type="text" id="alamat"
                name="alamat"
                value="{{ $destinasi->alamat }}"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 @error('alamat') border-red-600 @enderror dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required>
                @error('alamat')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
                @enderror
        </div>
        <div class="mb-6">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan Deskripsi</label>
            <textarea type="text" id="deskripsi"
                name="deskripsi"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 @error('deskripsi') border-red-600 @enderror dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required>
                {{ $destinasi->deskripsi }}
            </textarea>
                @error('deskripsi')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
                @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
        </button>
    </form>

</section>
@endsection
