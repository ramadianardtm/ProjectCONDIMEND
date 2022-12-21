<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cfebdc1fe4.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
</head>

<body>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
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
            <div class="w-1/12 flex justify-between items-center" id="navbar-default">
                <p>Dashboard</p>
                <i class="fas fa-user-circle"></i>
            </div>
        </div>
    </nav>
    <img src="{{ asset('images/line.png') }}" alt="Line Navbar" class="w-full h-1.5">
    <div class="px-8 my-16">
        <div class="mt-8 mx-8 flex">
            <div class="w-2/12 p-2 bg-white border border-gray-200 rounded-2xl shadow-md">
                <nav class="space-y-1" aria-label="Sidebar">
                    <a href="{{ route('pengelola.regparkir') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('user.search') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-plus"></i>
                        <span class="truncate">&nbsp;&nbsp; Register </span>
                    </a>
                    <a href="{{ route('pengelola.dashboard') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('user.search') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-search"></i>
                        <span class="truncate">&nbsp;&nbsp; Dashboard </span>
                    </a>

                    <a href="{{ route('pengelola.rekap') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('user.history') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-book"></i>
                        <span class="truncate">&nbsp;&nbsp; Rekap </span>
                    </a>

                    <a href="{{ route('pengelola.info') }}" class="hover:bg-grayBackground hover:text-blueDark flex items-center pl-3.5 py-2 text-base rounded-lg {{ Route::is('user.info') ? 'bg-grayBackground text-blueDark' : ''}}" aria-current="page">
                        <i class="fas fa-cog"></i>
                        <span class="truncate">&nbsp;&nbsp; Info </span>
                    </a>
                </nav>
            </div>
            @yield('content')
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
</body>

</html>