@extends('dashboard.layout.layout')
@section('container')
@include('dashboard.layout.components.flashMessage')
<form action="{{ route('dashboard.log.index') }}" class="mb-5 flex">
    @include('dashboard.layout.components.betweenDatepicker')
    <div class="p-3">
        <button type="submit" class="px-4 py-2 bg-sky-500 rounded-lg text-white">Filter</button>
    </div>
</form>
<div class="col-span-2 relative overflow-x-auto shadow-md sm:rounded-lg border">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-slate-50 dark:text-white dark:bg-gray-800">
            Data Log
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Data Log akan bertambah sesuai aktivitas yang admin lakukan pada device seperti tambah, edit, atau hapus device</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Device
                </th>
                <th scope="col" class="px-6 py-3">
                    User
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Aktivitas
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
            </tr>
        </thead>
        <tbody>
            @if($logs->count() > 0)
                @foreach ($logs as $item)
                    <tr class="bg-slate-50 border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->device }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->user }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($item->status == 'active')
                                <p class="bg-sky-500 rounded p-1 text-white text-center">
                            @elseif($item->status == 'maintenance')
                                <p class="bg-yellow-300 rounded p-1 text-white text-center">
                            @else
                                <p class="bg-red-500 rounded p-1 text-white text-center">
                            @endif
                                {{ $item->status }}
                            </p>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->activity }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->created_at }}
                        </th>
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

<div class="mt-5 text-center">
    {{ $logs->links() }}
</div>
@endsection
