@extends('dashboard.layout.layout')
@section('container')
@include('dashboard.layout.components.flashMessage')
<form method="post" action="{{ route('dashboard.user.store') }}">
    @csrf
    <div class="mb-10">
      <label for="name" class="@error('name') text-red-700 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
      <input value="{{ old('name') }}" name="name" type="text" id="name" class="@error('name') border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
      @error('name')
      <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
    </div>
    <div class="mb-10">
      <label for="name" class="@error('email') text-red-700 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
      <input value="{{ old('email') }}" name="email" type="text" id="email" class="@error('email') border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
      @error('email')
      <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
    </div>
    <div class="mb-10">
      <label for="password" class="@error('password') text-red-700 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
      <input value="{{ old('password') }}" name="password" type="password" id="password" class="@error('password') border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
      @error('password')
      <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
    </div>
    <div class="mb-10">
        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
        <div class="flex items-center mb-4">
            <input id="admin" type="radio" value="admin" name="role" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="admin" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>
        </div>
        <div class="flex items-center">
            <input checked id="pengelola" type="radio" value="pengelola" name="role" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="pengelola" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pengelola</label>
        </div>
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
@endsection
