<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/cfebdc1fe4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    *,
    html {
        font-family: 'Poppins', sans-serif;
        color: #000;
    }

    .btn-signup {
        display: inline;
        height: 30px;
        width: 200px;
        font-size: 14px;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #564b46;
        background-color: #fff;
        color: #564b46;
    }

    .btn-signup:hover {
        display: inline;
        height: 30px;
        width: 120px;
        font-size: 14px;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #564b46;
        background-color: #564b46;
        color: #fff;
        font-weight: 500;
    }

    footer {
        width: 100%;
        color: grey;
    }

    .btn-signin {
        display: inline;
        height: 30px;
        width: 120px;
        border-radius: 30px;
        border: 2px;
        border-style: solid;
        border-color: #1e87c3;
        background-color: #1e87c3;
        color: #fff;
        font-weight: 500;
    }

    .btn-signin:hover {
        width: 200px;
        border-radius: 30px;
        border: 2px;
        border-style: solid;
        border-color: #37c1f0;
        background-color: #37c1f0;
        color: #fff;
    }

    .btn-signup {
        display: inline;
        height: 30px;
        width: 200px;
        font-size: 14px;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #564b46;
        background-color: #fff;
        color: #564b46;
    }

    .btn-signup:hover {
        display: inline;
        height: 30px;
        width: 120px;
        font-size: 14px;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #564b46;
        background-color: #564b46;
        color: #fff;
        font-weight: 500;
    }

    .titleheader {
        font-weight: 800;
        font-size: 55px;
        font-family: 'Poppins', sans-serif;
    }

    .form-control {
        border-radius: 8px;
    }

    .footer-black {
        background-color: #141414;
        width: 100%;
        font-family: 'Poppins', sans-serif;
    }

    .btn-chat {
        height: fit-content;
        width: 80%;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #fff;
        background-color: #141414;
        color: #fff;
        font-weight: 500;
    }

    .btn-chat:hover {
        width: 80%;
        font-weight: 500;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #fff;
        color: #000;
    }
</style>

<body>
    @if (\Illuminate\Support\Facades\Auth::check())
    @if (\Illuminate\Support\Facades\Auth::user()->role == 'pengelola')
    <nav class="bg-white border-gray-200 px-2 py-3.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto px-12">
            <a href="{{ route('user.search') }}" class="flex items-center">
                <img src="{{ asset('images/condimendlogo.png') }}" class="mr-3" style="width:100px;object-fit:cover;position:absolute;padding-top:10px;" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="w-2/12 flex justify-between items-center" id="navbar-default">
                <div class="row">
                    <div class="col">
                        <p>Dashboard</p>
                    </div>
                    <div class="col">
                        <i class="fas fa-user-circle" style="font-size: 20px;margin-left:-15px;"></i>
                    </div>
                    <div class="col">
                        <a href="/logout"><i class="fa-solid fa-right-from-bracket" style="font-size: 20px;margin-left:-15px"></i></a>

                    </div>

                </div>
            </div>
        </div>
    </nav>
    @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'member')
    <nav class="bg-white border-gray-200 px-2 py-3.5 rounded dark:bg-gray-900">
        <div class="row  flex flex-wrap items-center justify-between mx-4 px-12">
            <div class="col-sm-4">
                <a href="{{ route('user.search') }}" class="flex items-center">
                    <img src="{{ asset('images/condimendlogo.png') }}" class="mr-3" style="width:100px;object-fit:cover;position:absolute;padding-top:10px;" />
                </a>
            </div>
            <div class="col-sm-6">
                <a class="text-dark mx-3" style="font-size: 15px;" href="{{ route('user.homepage') }}">Home</a>
                <a class="text-dark mx-3" style="font-size: 15px;" href="{{ route('user.product') }}">Product</a>
                <a class="text-dark mx-3" style="font-size: 15px;" href="{{ route('user.order') }}">My Order</a>
                <a class="text-dark mx-3" style="font-size: 15px;" href="{{ route('user.history') }}">History</a>
            </div>
            <div class="col-sm-2" style="text-align: end; vertical-align: middle;" id="navbar-default">
                <a class="btn" href="{{ route('user.info') }}"><i class="fas fa-user-circle" style="font-size: 25px;"></i></a>
                <a class="btn btn-signup" href="/logout">Sign Out</a>
                <!-- <a href="/logout"><i class="fa-solid fa-right-from-bracket" style="font-size: 20px;margin-left:-15px"></i></a> -->
            </div>
        </div>
        </div>
    </nav>
    @endif
    @endif
    @if (\Illuminate\Support\Facades\Auth::check())
    @if (\Illuminate\Support\Facades\Auth::user()->role != 'member')
    <div class="px-8 my-16">
        <div class="mt-8 mx-8 flex">
            <div class="w-2/12 p-2 bg-white border border-gray-200 rounded-2xl shadow-md">
                @if (\Illuminate\Support\Facades\Auth::check())
                @if (\Illuminate\Support\Facades\Auth::user()->role == 'member')
                <!-- <nav class="space-y-1" aria-label="Sidebar">
                    <a href="{{ route('user.homepage') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('user.homepage') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fa-solid fa-house"></i>
                        <span class="truncate">&nbsp;&nbsp; Home </span>
                    </a>
                    <a href="{{ route('user.search') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('user.search') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-search"></i>
                        <span class="truncate">&nbsp;&nbsp; Cari </span>
                    </a>

                    <a href="{{ route('user.history') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('user.history') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-book"></i>
                        <span class="truncate">&nbsp;&nbsp; Riwayat </span>
                    </a>

                    <a href="{{ route('user.info') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('user.info') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-cog"></i>
                        <span class="truncate">&nbsp;&nbsp; Info </span>
                    </a>
                </nav> -->
                @elseif (\Illuminate\Support\Facades\Auth::user()->role == 'pengelola')
                <nav class="space-y-1" aria-label="Sidebar">
                    <a href="{{ route('pengelola.trainer') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('pengelola.trainer') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fa-solid fa-user-plus"></i>
                        <span class="truncate">&nbsp;&nbsp; Add Trainer </span>
                    </a>
                    <a href="{{ route('pengelola.regparkir') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('pengelola.regparkir') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-plus"></i>
                        <span class="truncate" style="margin-left: 5px;">&nbsp;&nbsp; Add Product </span>
                    </a>
                    <a href="{{ route('pengelola.dashboard') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('pengelola.dashboard') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-book-open"></i>
                        <span class="truncate">&nbsp;&nbsp; Dashboard </span>
                    </a>

                    <a href="{{ route('pengelola.product') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('pengelola.product') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fa-solid fa-briefcase"></i>
                        <span class="truncate">&nbsp;&nbsp; Manage Product </span>
                    </a>

                    <a href="{{ route('pengelola.rekap') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('pengelola.rekap') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-book"></i>
                        <span class="truncate">&nbsp;&nbsp; Rekap </span>
                    </a>
                    <a href="{{ route('pengelola.profile') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('pengelola.profile') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-user"></i>
                        <span class="truncate">&nbsp;&nbsp; Profile </span>
                    </a>
                </nav>
                @elseif (\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                <nav class="space-y-1" aria-label="Sidebar">
                    <a href="{{ route('admin.analytics') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('admin.analytics') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-book-open"></i>
                        <span class="truncate">&nbsp;&nbsp; Analytics </span>
                    </a>
                    <a href="{{ route('admin.transaksi') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('admin.transaksi') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fa-solid fa-pencil"></i>
                        <span class="truncate">&nbsp;&nbsp; Transaksi </span>
                    </a>

                    <a href="{{ route('admin.riwayat') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('admin.riwayat') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fa-solid fa-book"></i>
                        <span class="truncate">&nbsp;&nbsp; Riwayat </span>
                    </a>

                    <a href="{{ route('admin.user') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('admin.user') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-user"></i>
                        <span class="truncate">&nbsp;&nbsp; User </span>
                    </a>
                    <a href="{{ route('admin.pengelola') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('admin.pengelola') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fa-solid fa-briefcase"></i>
                        <span class="truncate">&nbsp;&nbsp; Pengelola </span>
                    </a>
                </nav>

                @endif
                @endif
            </div>
            @yield('content')
        </div>
    </div>
    @else
    @yield('content')
    <footer>
        <div class="footer-black">
            <div class="container-footer" style="padding: 20px;padding-bottom:70px;">
                <div class="row" style="height:fit-content;">
                    <div class="col-md-3" style="padding-left:70px;padding-top:20px;">
                        <img style="width: 200px; height:100%;" src="{{ asset('images/condimendfoot.png') }}" alt="">
                    </div>
                </div>
                <div class="row" style="padding-left:60px;">
                    <div class="col-md-3" style="margin-right: 50px;">
                        <P style="font-size: 15px; color:#fff;margin-top: 40px;">PT CONDIMEND</P>
                        <P style="font-size: 15px; color:#fff;margin-top: 5px;">Jalan Lagoon Timur, Tangerang Selatan, Banten, 47500.</P>
                    </div>
                    <div class="col-md-2">
                        <P style="font-size: 15px; color:#fff;margin-top: 40px; font-weight:500;">Menu</P>
                        <div><a href="{{ route('user.homepage') }}" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Home</a></div>
                        <div style="margin-top:8px;"><a href="{{ route('user.product') }}" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Products</a></div>
                        <div style="margin-top:8px;"><a href="/customorder" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Chat</a></div>
                        <div style="margin-top:8px;"><a href="/transaction" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Transactions</a></div>
                    </div>
                    <div class="col-md-1" style="margin-right: 40px;">
                        <P style="font-size: 15px; color:#fff;margin-top: 40px; font-weight:500;">Others</P>
                        <div><a href="/cart" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Cart</a></div>
                        <div style="margin-top:8px;"><a href="/profile" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Profile</a></div>
                        <div style="margin-top:8px;"><a href="/about" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">About Us</a></div>
                    </div>
                    <div class="col-md-3">
                        <P style="font-size: 15px; color:#fff;margin-top: 40px;">Phone: +621139836329</P>
                        <P style="font-size: 15px; color:#fff;">Email: adminsupport@condimend.id</P>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-2">
                                <a class="text-dark mx-2" style="font-size: 15px;" href=""><i class="fa-brands fa-instagram" style="color: #fff;opacity:0.5;font-size:20px;"></i></a>
                            </div>
                            <div class="col-md-2">
                                <a class="text-dark mx-2" style="font-size: 15px;" href=""><i class="fa-brands fa-linkedin" style="color: #fff;opacity:0.5;font-size:20px;"></i></a>
                            </div>
                            <div class="col-md-2">
                                <a class="text-dark mx-2" style="font-size: 15px;" href=""><i class="fa-brands fa-twitter" style="color: #fff;opacity:0.5;font-size:20px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <P style="font-size: 15px; color:#fff;margin-top: 40px; font-weight:500;">Have a questions?</P>
                        <a class="btn btn-chat" href="https://api.whatsapp.com/send/?phone=601139836325&text&app_absent=0">Chat Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @endif
    @endif
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</body>

</html>