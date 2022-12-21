<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>

<body>
    <div class="flex justify-center">
        <div class="w-1/2 h-screen py-11 px-24 flex flex-col items-center justify-center flex-nowrap">
            <i class="fas fa-chevron-left text-4xl self-start" onclick="history.back()"></i>
            <p class="text-center text-4xl mb-11">Login</p>
            @if ($message = Session::get('success'))
                <div class="p-4 mb-4 w-full text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    {{ $message }}
                </div>
            @endif
            @if ($errors->has('login'))
                <div class="p-4 mb-4 w-full text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    {{ $errors->first('login') }}
                </div>
            @endif
            @if ($errors->any() && !$errors->has('login'))
                <div class="flex w-full p-4 mb-4 text-sm text-white bg-red-700 rounded-lg self-start" role="alert">
                    <ul class="mt-1.5 text-blue-700 list-disc list-inside">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </ul>
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST" class="w-full">
                @csrf
                <div class="mb-6 w-full">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="E-mail" required>
                </div>
                <div class="relative mb-6 w-full">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Password" required>
                    <i class="fas fa-eye absolute right-2.5 bottom-2 p-1 cursor-pointer" id="eye"></i>
                </div>
                <a href="#" class="float-right self-end font-medium text-blue mb-5 mt-10">Lupa Kata Sandi?</a>
                <button type="submit"
                    class="focus:outline-none w-full bg-orange font-medium rounded-lg text-xl px-5 py-4 mr-2 mb-2">Login</button>
            </form>
            <p class="text-center mt-9">Belum memiliki akun? <a href="{{ route('register-form') }}"
                    class="text-blue">Registrasi</a></p>
        </div>
        <div class="w-1/2 h-screen bg-repeat bg-10 bg-scroll bg-center flex justify-center flex-col items-center"
            style="background-image: url({{ asset('images/car-tile.png') }})">
            <img src="{{ asset('images/car-illust.png') }}" alt="Car Illustrator">
        </div>
    </div>
    <script>
        const passwordInput = document.querySelector("#password")
        const eye = document.querySelector("#eye")

        eye.addEventListener("click", function() {
            this.classList.toggle("fa-eye-slash")
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
            passwordInput.setAttribute("type", type)
        })
    </script>
</body>

</html>
