<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>

<body>
    <div class="flex justify-center">
        <div class="w-1/2 h-screen py-11 px-24 flex flex-col items-center justify-center flex-nowrap">
            <i class="fas fa-chevron-left text-4xl self-start" onclick="history.back()"></i>
            <p class="text-center text-4xl mb-11">Register User</p>
            @if ($errors->any())
            <div class="flex w-full p-4 mb-4 text-sm text-white bg-red-700 rounded-lg self-start" role="alert">
                <ul class="mt-1.5 text-blue-700 list-disc list-inside">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            </div>
            @endif
            <form action="{{ route('register') }}" method="POST" class="w-full">
                @csrf
                <div class="mb-6 w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" value="{{ old('name') }}" required>
                </div>
                <div class="mb-6 w-full">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="E-mail" value="{{ old('email') }}" required>
                </div>
                <div class="relative mb-6 w-full">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Password" required>
                    <i class="fas fa-eye absolute right-2.5 bottom-2 p-1 cursor-pointer" id="eye"></i>
                </div>
                <div class="relative mb-6 w-full">
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                        Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Confirm Password" required>
                    <i class="fas fa-eye absolute right-2.5 bottom-2 p-1 cursor-pointer" id="eye_c"></i>
                </div>
                <div class="relative mb-6 w-full">
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pick Your Role</label>
                    <select name="role" id="role" style="width: 100%;border:solid 1px #ACB8C2;border-radius:6px;padding-left:10px;padding-right:10px;">
                        <option value="member">User</option>
                        <option value="pengelola">Pengelola</option>
                    </select>
                </div>
                <button type="submit" class="focus:outline-none w-full bg-orange font-medium rounded-lg text-xl px-5 py-4 mr-2 mb-2">Register</button>
            </form>
            <p class="text-center mt-9">Sudah memiliki akun? <a href="{{ route('login-form') }}" class="text-blue">Login</a></p>
        </div>
        <div class="w-1/2 h-screen bg-repeat bg-10 bg-scroll bg-center flex justify-center flex-col items-center" style="background-image: url({{ asset('images/car-tile.png') }})">
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

        const confirmPasswordInput = document.querySelector("#confirm_password")
        const eye_c = document.querySelector("#eye_c")

        eye_c.addEventListener("click", function() {
            this.classList.toggle("fa-eye-slash")
            const type = confirmPasswordInput.getAttribute("type") === "password" ? "text" : "password"
            confirmPasswordInput.setAttribute("type", type)
        })
    </script>
</body>

</html>