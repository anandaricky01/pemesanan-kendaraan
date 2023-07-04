@extends('dashboard.layout.layout')
@section('container')
<section id="halo">
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2 md:col-span-1 md:hidden">
            <h3 class="text-3xl font-bold dark:text-slate-100">Halo, {{ auth()->user()->name }}! Selamat Datang!</h3>
            <p>
                <span class="dark:text-slate-100">yuk, cek kegiatan apa saja hari ini!</span>
            </p>
        </div>
        <div class="col-span-2 md:col-span-1 justify-self-center self-center">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_7h7PLlcqez.json" background="transparent"
                speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        </div>
        <div class="col-span-2 md:col-span-1 invisible md:visible self-center">
            <h3 class="text-3xl font-bold dark:text-slate-100">Halo, {{ auth()->user()->name }}! Selamat Datang!</h3>
            <p>
                <span class="dark:text-slate-100">yuk, cek kegiatan apa saja hari ini!</span>
            </p>
        </div>
    </div>
</section>
<section id="tabel">
    <div class="grid grid-cols-2 gap-4">
        <div id="tabel-kendaraan-available" class="col-span-2 md:col-span-1">
            <p class="dark:text-slate-100 text-lg mb-2">Kendaraan Tersedia</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Plat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Merk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kendaraan->count() > 0)
                            @foreach ($kendaraan->where('status', 'active')->take(5) as $ken)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $ken->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $ken->plat }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ken->merk }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($ken->status == 'maintenance')
                                        <span class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                                            {{ $ken->status }}
                                        </span>
                                        @elseif($ken->status == 'expedition')
                                        <span class="bg-yellow-300 px-3 py-1 rounded text-white hover:bg-orange-400">
                                            {{ $ken->status }}
                                        </span>
                                        @else
                                        <span class="bg-green-500 px-3 py-1 rounded text-white hover:bg-green-600">
                                            {{ $ken->status }}
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td colspan="4" class="text-center px-3 py-2">
                                <span class="dark:text-slate-100">
                                    Kendaraan Kosong
                                </span>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div id="tabel-kendaraan-available" class="col-span-2 md:col-span-1">
            <p class="dark:text-slate-100 text-lg mb-2">Kendaraan Dalam Service</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Plat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Merk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kendaraan->count() > 0)
                            @foreach ($kendaraan->where('status', 'maintenance')->take(5) as $ken)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $ken->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $ken->plat }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ken->merk }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($ken->status == 'maintenance')
                                        <span class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                                            {{ $ken->status }}
                                        </span>
                                        @elseif($ken->status == 'expedition')
                                        <span class="bg-yellow-300 px-3 py-1 rounded text-white hover:bg-orange-400">
                                            {{ $ken->status }}
                                        </span>
                                        @else
                                        <span class="bg-green-500 px-3 py-1 rounded text-white hover:bg-green-600">
                                            {{ $ken->status }}
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td colspan="4" class="text-center px-3 py-2">
                                <span class="dark:text-slate-100">
                                    Kendaraan Kosong
                                </span>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div id="tabel-kendaraan-available" class="col-span-2">
            <p class="dark:text-slate-100 text-lg mb-2">Kendaraan Dalam Ekspedisi</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Plat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Merk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pemesanan->count() > 0)
                            @foreach ($pemesanan->take(5) as $ken)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $ken->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $ken->plat }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ken->merk }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($ken->status == 'maintenance')
                                        <span class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                                            {{ $ken->status }}
                                        </span>
                                        @elseif($ken->status == 'expedition')
                                        <span class="bg-yellow-300 px-3 py-1 rounded text-white hover:bg-orange-400">
                                            {{ $ken->status }}
                                        </span>
                                        @else
                                        <span class="bg-green-500 px-3 py-1 rounded text-white hover:bg-green-600">
                                            {{ $ken->status }}
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td colspan="4" class="text-center px-3 py-2">
                                <span class="dark:text-slate-100">
                                    Belum ada pemesanan
                                </span>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection
