<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>

<body>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto px-12">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="{{ asset('images/logo/logo.png') }}" class="h-6 mr-3 sm:h-9" alt="Yukparkir Logo" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-blueDark rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blueDark-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-blueDark dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-blueDark rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blueDark-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-blueDark dark:hover:text-white md:dark:hover:bg-transparent">Contact
                            Us</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="block py-2 pl-3 pr-4 text-blueDark rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blueDark-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-blueDark dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="block py-2 pl-3 pr-4 text-blueDark rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blueDark-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-blueDark dark:hover:text-white md:dark:hover:bg-transparent">Register</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
            </div>
        </div>
    </nav>
    <img src="{{ asset('images/line.png') }}" alt="Line Navbar" class="w-full h-1.5">
    <div>
        <div class="flex space-x-1 h-full w-full px-16 pt-20 justify-center bg-repeat bg-10 bg-scroll bg-center" style="background-image: url({{ asset('images/car-tile.png') }})">
            <div class="w-2/4 mr-8">
                <div class="block max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <p class="mb-2 text-6xl font-bold font-fugaz tracking-tight text-blueDark dark:text-white">YUKPARKIR
                    </p>
                    <p class="text-blueDark font-bold text-4xl">Solusi pencarian <text class="text-orange">lahan
                            parkir</text></p>
                    <p class="mt-7 text-blueDark">Informasi dan rekomendasi lahan parkir terbaik berdasarkan lokasi yang
                        dipilih.</p>
                </div>
                <div class="block max-w-xl p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <form action="{{ route('map.searchmap') }}" method="post">
                        @csrf

                        <input type="text" autocomplete="off" name="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange focus:border-orange focus:outline-none block w-96 py-5 px-3 text-center dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lokasi, Kode Pos, ...">

                        <button type="submit" class="mt-1 focus:outline-none text-white w-full bg-orange hover:bg-orange font-bold rounded-lg text-l mr-2 mb-2 p-2 dark:focus:ring-yellow-900">Cari</button>

                    </form>
                    @if ($message = Session::get('failed'))
                    <div class="p-4 mb-4 w-full text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        {{ $message }}
                    </div>
                    @endif
                    @if ($errors->has('login'))
                    <div class="p-4 mb-4 w-full text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        {{ $errors->first('login') }}
                    </div>
                    @endif
                    <hr class="my-2 h-0.5 bg-grayDivide border-0">
                    <a href="">
                        <p class="text-center text-blueText text-lg">Cari menggunakan map interaktif</p>
                    </a>
                </div>
            </div>
            <div class="w-3/4">
                <img src="{{ asset('images/car-illust.png') }}" alt="Car Illustrator" class="w-full h-full">
            </div>
        </div>
        <hr class="bg-gradient-to-t from-grayBackground to-white h-24 border-none">
    </div>
    <div class="w-full h-auto bg-grayBackground pb-14">
        <div class="flex justify-center pt-8">
            <div class="w-4/5">
                <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <p class="text-blueDark text-6xl font-medium text-center">Fitur dan Kelebihan</p>
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('images/car-icon-single.png') }}" alt="icon car" class="w-10 pr-2">
                        <p class="text-blueDark text-2xl">52 tempat parkir</p>
                    </div>
                </div>
                <div class="flex justify-between flex-row flex-nowrap pt-14">
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-xs">
                            <img class="rounded-t-lg" src="{{ asset('images/car-parking.png') }}" alt="" />
                            <h5 class="text-gray-900 text-xl p-2 text-center font-medium bg-orange rounded-b-lg">
                                Pencarian Lahan Parkir</h5>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-xs">
                            <img class="rounded-t-lg" src="{{ asset('images/priority.png') }}" alt="" />
                            <h5 class="text-gray-900 text-xl p-2 text-center font-medium bg-orange rounded-b-lg">Parkir
                                Prioritas</h5>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-xs">
                            <img class="rounded-t-lg" src="{{ asset('images/location.png') }}" alt="" />
                            <h5 class="text-gray-900 text-xl p-2 text-center font-medium bg-orange rounded-b-lg">
                                Informasi Lokasi Publik</h5>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between flex-row flex-nowrap pt-14">
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white w-max">
                            <img class="rounded-t-lg" src="{{ asset('images/mobile-pay.png') }}" alt="" />
                            <h5 class="text-gray-900 text-xl p-2 text-center font-medium bg-orange rounded-b-lg">
                                Reservasi Parkir</h5>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white w-max">
                            <img class="rounded-t-lg" src="{{ asset('images/mobile-pay.png') }}" alt="" />
                            <h5 class="text-gray-900 text-xl p-2 text-center font-medium bg-orange rounded-b-lg">
                                Pambayaran</h5>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white w-max">
                            <img class="rounded-t-lg" src="{{ asset('images/mobile-pay.png') }}" alt="" />
                            <h5 class="text-gray-900 text-xl p-2 text-center font-medium bg-orange rounded-b-lg">Promo
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-screen bg-blueDark pb-14 bg-repeat bg-scroll bg-center" style="background-image: url({{ asset('images/tile.png') }})">
        <div class="flex justify-center pt-16 flex-col items-center">
            <p class="text-center text-white text-3xl max-w-3xl">Anda pemiliki atau operator tempat parkir dan ingin
                mempromosikan tempat parkir anda?</p>
            <div class="bg-orange flex justify-center items-center w-2/4 h-96 mt-6">
                Illustrasi pemilik / operator tempat parkir
            </div>
            <button type="button" class="focus:outline-none w-1/4 mt-8 bg-orange hover:bg-orange rounded-lg text-sm px-5 py-4 font-bold mr-2 mb-2 dark:focus:ring-yellow-900">Bergabung</button>
        </div>
    </div>
    <div class="bg-blueDarker w-full h-auto">
        <div class="flex justify-center py-12 flex-col items-center">
            <p class="text-white">Social Media</p>
            <div class="flex justify-center pt-4">
                <a href="#"><i class="fab fa-facebook-f text-white"></i></a>
                <a href="#"><i class="fab fa-twitter text-white px-6"></i></a>
                <a href="#"><i class="fab fa-instagram text-white"></i></a>
            </div>
        </div>
    </div>
</body>

</html>