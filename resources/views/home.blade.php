@extends('layout.layout')
@section('container')

<style>
    .pop-out {
        animation: popOut 0.5s;
    }

    @keyframes popOut {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        20% {
            transform: scale(1.2);
        }

        40% {
            transform: scale(0.9);
        }

        60% {
            transform: scale(1.1);
        }

        80% {
            transform: scale(0.95);
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>

<section id="hero">
    <div class="mt-12 py-10 mb-10">
        <div class="grid grid-cols-2 gap-4">
            <div class="lg:visible md:visible sm:invisible max-[763px]:hidden">
                <div
                    class="relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px]">
                    <div
                        class="h-[32px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -left-[17px] top-[72px] rounded-l-lg">
                    </div>
                    <div
                        class="h-[46px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -left-[17px] top-[124px] rounded-l-lg">
                    </div>
                    <div
                        class="h-[46px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -left-[17px] top-[178px] rounded-l-lg">
                    </div>
                    <div
                        class="h-[64px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -right-[17px] top-[142px] rounded-r-lg">
                    </div>
                    <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">
                        <img src="{{ asset('img/mockup.png') }}" class="dark:hidden w-[300px] h-[572px]" alt="">
                        {{-- <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/mockup-1-dark.png"
                            class="hidden dark:block w-[272px] h-[572px]" alt=""> --}}
                    </div>
                </div>
            </div>
            <div class="max-[762px]:col-span-2 max-[762px]:text-center max-[762px]:px-3">
                <p id='welcome' class="pop-out font-extrabold lg:text-5xl md:text-4xl sm:text-4xl max-[637px]:text-4xl">
                    Pantau <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl">Tinggi Air
                        Sungai</span><br> secara Real-Time</p>
                <p class="pop-out font-semibold text-lg mt-5">Dapatkan Informasi Terkini tentang Tinggi Air Sungai
                    <br>Pemancingan Bon Klopo dengan <a class="text-sky-500 after:content-['_↗'] font-bold"
                        href="{{ route('monitoring') }}">Monitoring</a> Online</p>
                <a href="{{ route('monitoring') }}">
                    <button type="button" class="mt-3 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        Monitor Sekarang
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="keuntungan"
    class="bg-gradient-to-r from-cyan-500 to-blue-500 lg:px-20 lg:py-20 md:px-14 md:py-14 sm:px-14 sm:py-14 max-[639px]:px-10 max-[639px]:py-10">
    <div class="grid grid-cols-3 gap-10">
        <div class="col-span-3 justify-self-center text-center">
            <h1
                class="mb-4 lg:text-6xl md:text-5xl sm:text-4xl max-[639px]:text-3xl font-extrabold text-white dark:text-white md:text-4xl lg:text-5xl">
                Kemudahan yang Ditawarkan
            </h1>
            <p class="text-xl font-semibold text-white">Beberapa kemudahan yang ditawarkan oleh Web Monitoring ialah :</p>
        </div>
        <div class="lg:col-span-1 md:col-span-1 sm:col-span-3 max-[639px]:col-span-3">
            <a href="#"
                class="transition ease-in-out duration-300 block max-w-sm p-6 bg-white border hover:scale-110 border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="mb-1">
                    <svg class="w-12 bg-sky-500 justify-self-center p-2 rounded-full stroke-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </div>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Mudah Diakses
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">
                    Mudah diakses karena tidak perlu mengunduh aplikasi terlebih dahulu
                </p>
            </a>
        </div>
        <div class="lg:col-span-1 md:col-span-1 sm:col-span-3 max-[639px]:col-span-3">
            <a href="#"
                class="transition ease-in-out duration-300 block max-w-sm p-6 bg-white border hover:scale-110 border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="mb-1">
                    <svg class="w-12 bg-sky-500 justify-self-center p-2 rounded-full stroke-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Dapat Diakses Dimana Saja
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">
                    Web Monitoring mendukung tampilan mobile sehingga dapat diakses dari mana saja
                </p>
            </a>
        </div>
        <div class="lg:col-span-1 md:col-span-1 sm:col-span-3 max-[639px]:col-span-3">
            <a href="#"
                class="transition ease-in-out duration-300 block max-w-sm p-6 bg-white border hover:scale-110 border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="mb-1">
                    <svg class="w-12 bg-sky-500 justify-self-center p-2 rounded-full stroke-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Real-Time
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">
                    Data yang diunggah pada website dilakukan secara Real-Time
                </p>
            </a>
        </div>
    </div>
</section>

<script>
    window.addEventListener("load", function() {
        var myDiv = document.getElementById("welcome");
        myDiv.style.animation = "none";
        void myDiv.offsetWidth; // Memaksa browser untuk me-repaint elemen

        myDiv.classList.add("pop-out");
    });
</script>

@endsection
