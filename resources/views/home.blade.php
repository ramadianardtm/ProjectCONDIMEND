<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    *,
    html {
        font-family: 'Poppins', sans-serif;
    }

    .btn-reg {
        color: #fff;
        font-weight: 400;
        width: 100%;
        margin-top: 20px;
        font-size: 16px;
        border-radius: 12px;
        background-color: #564b46;
    }

    .btn-reg:hover {
        color: #fff;
        font-weight: 400;
        width: 100%;
        font-size: 16px;
        border-radius: 12px;
        background-color: #876f61;
    }
    .btn-sign {
        color: #564b46;
        font-weight: 400;
        border: solid 1px #564b46;
        width: 100%;
        margin-top: 20px;
        font-size: 16px;
        border-radius: 12px;
        background-color: #fff;
    }
    .btn-sign:hover {
        color: #fff;
        font-weight: 400;
        width: 100%;
        font-size: 16px;
        border-radius: 12px;
        background-color: #876f61;
    }
</style>

<body>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto px-12">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="{{ asset('images/condimendlogo.png') }}" class="mr-3" style="width:100px;object-fit:cover;position:absolute" />
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

    <div>
        <div class="flex space-x-1 h-full w-full px-16 justify-center bg-repeat bg-10 bg-scroll bg-center" style="margin-top: 50px;">
            <div class="w-2/4 mr-8">
                <div class="block max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <p class="mb-2 text-6xl font-bold font-fugaz tracking-tight" style="color:#564b46">CONDIMEND
                    </p>
                    <p class="font-bold text-4xl" style="color: #564b46;">Find your needs for good <text style="color:#c9a126">construction.</text></p>
                    <p class="mt-7" style="color:#564b46">Information and recommendation for the best construction solutions.</p>
                </div>
                <a href=""><button type="button" style="margin-top:20px" class="btn btn-sign focus:outline-none rounded-lg text-sm px-5 py-4 font-bold mr-2 mb-2">Don't Missed Your Chance!</button></a>  
            </div>
            <div class="w-3/4">
                <img src="{{ asset('images/arci1.jpg') }}" class="w-full" style="height: 430px;object-fit:cover;border-radius:12px;">
            </div>
        </div>
    </div>
    <div class="w-full h-auto pb-14" style="background-color: #111111; margin-top:100px">
        <hr class="bg-gradient-to-t from-grayBackground to-white h-24 border-none" style="background-color: #242424;">
        <div class="flex justify-center pt-8">
            <div class="w-4/5" style="background-color: #564b46;margin-top:-120px;border-radius:12px;padding:50px">
                <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <p class="text-6xl font-medium text-center" style="color:#111111">Why Us?</p>
                    <div class="flex justify-center items-center mt-3">
                        <p class="text-2xl" style="color:#111111">Construction in demand</p>
                    </div>
                </div>
                <div class="flex justify-between flex-row flex-nowrap pt-14">
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-xs">
                            <img class="m-auto p-4" style="border-radius:10px !important; height:300px;width:250px;object-fit:cover;" src="{{ asset('images/detail3.jpg') }}" alt="" />
                            <h5 style="font-size: 17px;" class="text-gray-900 text-xl p-2 text-center rounded-b-lg">
                                Effective Design</h5>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-xs">
                            <img class="m-auto p-4" style="border-radius:10px !important; height:300px;width:250px;object-fit:cover;" src="{{ asset('images/detail2.jpg') }}" alt="" />
                            <h5 style="font-size: 17px;" class="text-gray-900 text-xl p-2 text-center rounded-b-lg">
                                Affordable Price</h5>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-xs">
                            <img class="m-auto p-4" style="border-radius:10px !important; height:300px;width:250px;object-fit:cover;" src="{{ asset('images/detail1.jpg') }}" alt="" />
                            <h5 style="font-size: 17px;" class="text-gray-900 text-xl p-2 text-center rounded-b-lg">
                                Elegant Interior Design</h5>
                        </div>
                    </div>
                </div>
                <!-- <div class="flex justify-between flex-row flex-nowrap pt-14">
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
                </div> -->
            </div>
        </div>
    </div>
    <div class="w-full justify-center items-center" style="background-color: #111111;height:900px;">
        <div class="flex justify-center py-12 flex-col items-center">
            <p class="text-white" style="font-size: 30px;margin-top:100px">are you interested to know more about condimend?</p>
            <div class="d-flex justify-center items-center w-2/4 h-96" style="margin-top: 30px;">
                <img style="border-radius:12px" src="{{ asset('images/arci5.jpg') }}" alt="">
            </div>
          <a href="https://api.whatsapp.com/send?phone=6285894954819"><button type="button" style="width: 200px !important; margin-top:100px" class="btn btn-reg focus:outline-none rounded-lg text-sm px-5 py-4 font-bold mr-2 mb-2">Chat Us Now!</button></a>  
        </div>
    </div>
    <hr width="70%">
    <div class="w-full h-auto" style="background-color: #111111;">
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