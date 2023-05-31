@extends('layout.layout')
@section('container')

<section class="bg-gray-200 dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
    <div class="mx-5 py-5">
        <div class="grid grid-cols-1 lg:grid-cols-6 gap-4 lg:gap-5 lg:p-5 p-3">
            <div class="lg:col-span-2 bg-white rounded-xl p-5 drop-shadow-lg">
                <div class="text-center">
                    <div class="transition duration-200 ease-in-out">
                        <p class="font-sans font-bold text-2xl dark:text-white mb-4">Kondisi Air</p><br>
                        <div class="text-center inline-block mt-3">
                            <i id="icon" class="stroke-1 stroke-slate-200 fill-blue-500 w-40 h-40" data-feather=""></i>
                        </div>
                        <div class="transition ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 duration-700">
                            <p id="kondisi" class="font-sans font-bold text-5xl text-blue-500"></p>
                        </div><br>
                        <p id="pesan" class="font-sans font-medium text-base dark:text-white"></p><br>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2 rounded-xl p-5 bg-white drop-shadow-lg">
                <div class="text-center">
                    <p class="text-2xl mb-10 font-sans font-bold dark:text-white mt-3">Tinggi Air</p>
                    <div class="inline-block mt-3">
                        <i id="icon-air" class="stroke-1 stroke-slate-200 fill-blue-500 w-40 h-40" data-feather=""></i>
                    </div>
                    <div class="transition ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 duration-700">
                        <p id="tinggi-air" class="font-sans font-bold text-5xl text-blue-500"></p>
                    </div><br>
                    <p id="pesan-tinggi-air" class="font-sans font-medium text-base dark:text-white">
                    </p><br>
                </div>
            </div>
            <div class="lg:col-span-2 rounded-xl p-5 bg-white drop-shadow-lg">
                <p class="text-center text-2xl mb-5 font-sans font-bold dark:text-white mt-3">Informasi Cuaca<br>Kabupaten
                    Malang</p>
                <p class="text-center text-lg mb-3 font-sans font-bold dark:text-white mt-3">
                    {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('l, d F Y') }}
                </p>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Jam (WIB)
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kondisi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cuaca != 'kosong')
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        00.00
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ weatherIndex($cuaca[4]['value']) }}
                                    </td>
                                </tr>
                                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        06.00
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ weatherIndex($cuaca[5]['value']) }}
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        12.00
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ weatherIndex($cuaca[6]['value']) }}
                                    </td>
                                </tr>
                                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        18.00
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ weatherIndex($cuaca[7]['value']) }}
                                    </td>
                                </tr>
                            @else
                                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" colspan="2" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Terdapat masalah saat pengambilan data
                                    </th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <p class="font-sans font-medium text-sm text-gray-500 dark:text-gray-700 mt-3">
                    (sumber data : https://data.bmkg.go.id)
                </p>
            </div>
        </div>
        <script>
            function updateDataInView(data) {
                console.log(data);
                tinggi_air = 29 - data;
                console.log(tinggi_air);
                var thumbsIcon = document.getElementById('icon');
                var dropletIcon = document.getElementById('icon-air');
                var titleElement = document.getElementById('kondisi');
                var tinggiAir = document.getElementById('tinggi-air');
                var descriptionElement = document.getElementById('pesan');
                var pesanTinggiAir = document.getElementById('pesan-tinggi-air');

                if (data === null) {
                    thumbsIcon.setAttribute('data-feather', 'alert-circle');
                    dropletIcon.setAttribute('data-feather', 'alert-circle');
                    thumbsIcon.classList.remove('fill-blue-500', 'fill-red-500');
                    dropletIcon.classList.remove('fill-blue-500', 'fill-red-500');
                    thumbsIcon.classList.add('fill-yellow-500');
                    dropletIcon.classList.add('fill-yellow-500');
                    titleElement.classList.remove('text-blue-500', 'text-red-500');
                    tinggiAir.classList.remove('text-blue-500', 'text-red-500');
                    titleElement.classList.add('text-yellow-500');
                    tinggiAir.classList.add('text-yellow-500');
                    titleElement.textContent = 'Terdapat Masalah pada Server';
                    tinggiAir.textContent = 'Terdapat Masalah pada Server';
                    pesanTinggiAir.textContent = 'Silahkan coba lagi setelah beberapa menit';
                    descriptionElement.textContent = 'Silahkan kembali lagi setelah beberapa saat';
                }
                else if (data < 29) {
                    thumbsIcon.setAttribute('data-feather', 'thumbs-down');
                    dropletIcon.setAttribute('data-feather', 'droplet');
                    thumbsIcon.classList.remove('fill-blue-500', 'fill-yellow-500');
                    thumbsIcon.classList.add('fill-red-500');
                    dropletIcon.classList.add('fill-blue-500');
                    titleElement.textContent = 'Tidak Aman!';
                    tinggiAir.textContent = `${tinggi_air} cm`;
                    titleElement.classList.remove('text-blue-500', 'text-yellow-500');
                    tinggiAir.classList.remove('text-blue-500', 'text-yellow-500');
                    titleElement.classList.add('text-red-500');
                    tinggiAir.classList.add('text-red-500');
                    pesanTinggiAir.textContent = 'Lebih tinggi dari batas aman';
                    descriptionElement.textContent = 'Waduh ketinggian air nya sedang tidak cocok untuk kegiatan memancing. Silahkan datang di lain waktu!';
                } else if (data >= 29){
                    thumbsIcon.setAttribute('data-feather', 'thumbs-up');
                    dropletIcon.setAttribute('data-feather', 'droplet');
                    thumbsIcon.classList.remove('fill-red-500', 'fill-yellow-500');
                    dropletIcon.classList.remove('fill-red-500', 'fill-yellow-500');
                    thumbsIcon.classList.add('fill-blue-500');
                    dropletIcon.classList.add('fill-blue-500');
                    titleElement.classList.remove('text-red-500', 'text-yellow-500');
                    tinggiAir.classList.remove('text-red-500', 'text-yellow-500');
                    titleElement.classList.add('text-blue-500');
                    tinggiAir.classList.add('text-blue-500');
                    titleElement.textContent = 'Aman!';
                    tinggiAir.textContent = `${tinggi_air * -1} cm`;
                    pesanTinggiAir.textContent = 'Lebih rendah dari batas aman';
                    descriptionElement.textContent = 'Ketinggian air aman untuk melakukan kegiatan memancing';
                }

                feather.replace();
            }

            function getDataFromAPI() {
                fetch('{{ route('data_sensor') }}')
                    .then(response => response.json())
                    .then(data => {
                        updateDataInView(data.data[0].data); // Panggil fungsi untuk memperbarui tampilan dengan data yang diterima
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            setInterval(getDataFromAPI, 1000);
        </script>

    </div>
</section>

@endsection
