@extends('dashboard.layout.layout')
@section('container')
@include('dashboard.layout.components.flashMessage')

<form method="post" action="{{ route('dashboard.device.update', $device->id) }}">
    @csrf
    @method('put')
    <div class="mb-10">
      <label for="name" class="@error('name') text-red-700 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama name</label>
      <input value="{{ $device->name }}" name="name" type="text" id="name" class="@error('name') border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
      @error('name')
      <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
    </div>
    <div class="mb-10">
      <label for="description" class="@error('description') text-red-700 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
        <textarea name="description" id="description" class="@error('name') border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            {{ $device->description }}
        </textarea>
        @error('description')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-10">
        <label for="status" class="@error('status') text-red-700 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Status Device</label>
        <select name="status" id="status" class="@error('name') border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="active" {{ $device->status == 'active' ? 'selected' : '' }}>Active</option>
        <option value="maintenance" {{ $device->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
        <option value="deactive" {{ $device->status == 'deactive' ? 'selected' : '' }}>Deactive</option>
        </select>
        @error('status')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
      @enderror
      </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>


@endsection
