@extends('dashboard.layout.layout')
@section('container')
<div class="mb-3">
    <a href="{{ route('dashboard.device.index') }}">
        <button class="transition ease-in-out duration-300 hover:scale-110 bg-red-600 text-white px-2 py-1 rounded-md hover:bg-red-700">
            Back
        </button>
    </a>
    <a href="{{ route('dashboard.device.edit', $device[0]->id) }}">
        <button class="transition ease-in-out duration-300 hover:scale-110 bg-yellow-300 text-white px-2 py-1 rounded-md hover:bg-yellow-400">
            Edit
        </button>
    </a>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" colspan="2" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Detail Device
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Nama Device
                </th>
                <td class="px-6 py-4">
                    {{ $device[0]->name }}
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Deskripsi Device
                </th>
                <td class="px-6 py-4">
                    {{ $device[0]->description }}
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Status
                </th>
                <td class="px-6 py-4">
                    <span class="bg-sky-500 rounded p-2 text-white text-center">
                        {{ $device[0]->status }}
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
