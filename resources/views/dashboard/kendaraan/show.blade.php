@extends('dashboard.layout.layout')
@section('container')
@include('dashboard.layout.components.flashMessage')
<h3 id="Plat Kendaraan" class="mb-3">
    <span class="dark:text-slate-100 text-2xl">
        Detail Kendaraan
    </span>
</h3>
<section id="tabel-kendaraan">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Detail Kendaraan
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ID Kendaraan
                    </th>
                    <td class="px-6 py-4">
                        {{ $kendaraan->id }}
                    </td>
                </tr>
                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Plat Nomor
                    </th>
                    <td class="px-6 py-4">
                        {{ $kendaraan->plat }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Merk
                    </th>
                    <td class="px-6 py-4">
                        {{ $kendaraan->merk }}
                    </td>
                </tr>
                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Status
                    </th>
                    <td class="px-6 py-4">
                        @if ($kendaraan->status == 'maintenance')
                        <span class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                            {{ $kendaraan->status }}
                        </span>
                        @elseif($kendaraan->status == 'expedition')
                        <span class="bg-yellow-300 px-3 py-1 rounded text-white hover:bg-orange-400">
                            {{ $kendaraan->status }}
                        </span>
                        @else
                        <span class="bg-green-500 px-3 py-1 rounded text-white hover:bg-green-600">
                            {{ $kendaraan->status }}
                        </span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section id="statistik-kendaraan" class="my-5">
    <div class="grid grid-cols-2 gap-4">
        <div style="position: relative; width: 100%; height: 300px;" class="col-span-2 md:col-span-1">
            <p class="text-xl dark:text-slate-100 font-bold text-center">Penggunaan per bulan</p>
            <canvas id="myChart"></canvas>
        </div>
        <div style="position: relative; width: 100%; height: 300px;" class="col-span-2 md:col-span-1">
            <p class="text-xl dark:text-slate-100 font-bold text-center">Penggunaan per bulan</p>
            <canvas id="myChart2"></canvas>
        </div>
    </div>
</section>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('myChart').getContext('2d');
        const ctx2 = document.getElementById('myChart2').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Konsumsi BBM',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        new Chart(ctx2, {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection
