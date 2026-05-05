<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="flex justify-between items-center p-6 bg-white shadow">
        <h1 class="text-lg font-bold">Web Inventory</h1>

        <div>
            @auth
                <a href="/catalog" class="mr-4 text-blue-600 hover:underline">
                    Katalog
                </a>

                @if(auth()->user()->role === 'admin')
                    <a href="/dashboard" class="mr-4 text-green-600 hover:underline">
                        Dashboard
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="text-red-600 hover:underline">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mr-4 text-blue-600 hover:underline">
                    Login
                </a>

                <a href="{{ route('register') }}" class="text-green-600 hover:underline">
                    Register
                </a>
            @endauth
        </div>
    </div>

    <div class="flex items-center justify-center h-[80vh]">
        <div class="text-center">
            <h2 class="text-3xl font-bold mb-4">
                Selamat Datang di Web Inventory
            </h2>

            <p class="text-gray-600 mb-6">
                Silakan login untuk mulai menggunakan sistem.
            </p>

            @auth
                <a href="/catalog" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Lihat Katalog
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Login
                </a>
            @endauth
        </div>
    </div>

</body>
</html>