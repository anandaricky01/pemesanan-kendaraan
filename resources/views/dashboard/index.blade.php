@extends('dashboard.layout.layout')
@section('container')

<section class="mb-5 grid grid-cols-3 gap-4">
    <div class="col-span-3 md:col-span-1">
        <div class="grid grid-cols-3 bg-slate-50 p-3 dark:bg-slate-700 rounded-lg border border-gray-200 shadow-md">
            <div class="bg-red-500 rounded-full p-3 justify-self-center self-center">
                <i data-feather="trending-up" class="stroke-white"></i>
            </div>
            <div class="col-span-2">
                <div class="grid grid-rows-2 p-2">
                    <p class="text-base font-medium dark:text-white">Data Tertinggi</p>
                    <p id="data-tertinggi" class="text-xl font-bold dark:text-white"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-3 md:col-span-1">
        <div class="grid grid-cols-3 bg-slate-50 p-3 dark:bg-slate-700 rounded-lg border border-gray-200 shadow-md">
            <div class="bg-emerald-500 rounded-full p-3 justify-self-center self-center">
                <i data-feather="trending-down" class="stroke-white"></i>
            </div>
            <div class="col-span-2">
                <div class="grid grid-rows-2 p-2">
                    <p class="text-base font-medium dark:text-white">Data Terendah</p>
                    <p id="data-terendah" class="text-xl font-bold dark:text-white"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-3 md:col-span-1">
        <div class="grid grid-cols-3 bg-slate-50 p-3 dark:bg-slate-700 rounded-lg border border-gray-200 shadow-md">
            <div class="bg-yellow-300 rounded-full p-3 justify-self-center self-center">
                <i data-feather="bar-chart-2" class="stroke-white"></i>
            </div>
            <div class="col-span-2">
                <div class="grid grid-rows-2 p-2">
                    <p class="text-base font-medium dark:text-white">Tinggi rata - rata</p>
                    <p id="tinggi-rata-rata" class="text-xl font-bold dark:text-white"></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="data-baru" class="mb-5">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption
                class="p-5 text-lg font-semibold text-left text-gray-900 bg-slate-50 dark:text-white dark:bg-gray-800">
                Data Baru Masuk
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Data baru akan masuk setiap 5 detik
                    sekali</p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tinggi Air
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Device
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody id="data-body">
            </tbody>
        </table>
    </div>
</section>

<section id="data-record">
    <div class="bg-slate-50 dark:bg-slate-700 rounded-lg border border-gray-200 shadow-md">
        <div id="tester" class=""></div>
    </div>
</section>
<script>
    function updateDataInView(data) {
        var status = data.success;
        var data_tinggi_air = data.data;
        var data_rekap = data.data_rekap;
        // console.log(data);

        var tableBody = document.getElementById('data-body');
        var data_tertinggi = document.getElementById('data-tertinggi');
        var data_terendah = document.getElementById('data-terendah');
        var tinggi_rata_rata = document.getElementById('tinggi-rata-rata');

        // Kosongkan isi tabel sebelum menambahkan data baru
        tableBody.innerHTML = '';

        // Iterasi melalui setiap objek data
        data_tinggi_air.forEach(function(data) {
            var row = document.createElement('tr');
            row.setAttribute('class', 'bg-slate-50 border-b dark:bg-gray-800 dark:border-gray-700');

            var tanggalCell = document.createElement('td');
            tanggalCell.setAttribute('id', 'tanggal');
            tanggalCell.setAttribute('class', 'px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white');
            tanggalCell.textContent = data.tanggal;
            row.appendChild(tanggalCell);

            var tinggiAirCell = document.createElement('td');
            tinggiAirCell.setAttribute('id', 'tinggi_air');
            tinggiAirCell.setAttribute('class', 'px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white');
            tinggiAirCell.textContent = data.tinggi;
            row.appendChild(tinggiAirCell);

            var deviceCell = document.createElement('td');
            deviceCell.setAttribute('id', 'device');
            deviceCell.setAttribute('class', 'px-6 py-4');
            deviceCell.textContent = data.device;
            row.appendChild(deviceCell);

            var statusCell = document.createElement('td');
            statusCell.setAttribute('class', 'px-6 py-4');

            var statusElement = document.createElement('p');
            statusElement.textContent = data.status;
            statusElement.setAttribute('id', 'status');
            statusElement.setAttribute('class', 'bg-sky-500 rounded p-1 text-white text-center');
            statusCell.appendChild(statusElement);

            row.appendChild(statusCell);

            tableBody.appendChild(row);
        });

        data_tertinggi.textContent = (29 - data_rekap.data_tertinggi) > 0 ? 'Naik ' + (29 - data_rekap.data_tertinggi) + ' cm' : 'Turun ' + -1*(29 - data_rekap.data_tertinggi) + ' cm';
        data_terendah.textContent = (29 - data_rekap.data_terendah) > 0 ? 'Naik ' + (29 - data_rekap.data_terendah) + ' cm' : 'Turun ' + -1*(29 - data_rekap.data_terendah) + ' cm';
        tinggi_rata_rata.textContent = (29 - data_rekap.data_rata_rata).toFixed(3) > 0 ? 'Naik ' + (29 - data_rekap.data_rata_rata).toFixed(3) + ' cm' : 'Turun ' + -1*(29 - data_rekap.data_rata_rata).toFixed(3) + ' cm';
        // tinggi_rata_rata.textContent = (29 - data_rekap.data_rata_rata).toFixed(3) + ' cm';
    }

    function getDataFromAPI() {
        fetch('{{ route('fetch-data') }}')
            .then(response => response.json())
            .then(data => {
                updateDataInView(data); // Panggil fungsi untuk memperbarui tampilan dengan data yang diterima
                // console.log(data);
            })
            .catch(error => {
                console.error(error);
            });
    }

    setInterval(getDataFromAPI, 2000);
</script>
@include('dashboard.utils.chart')
@endsection
