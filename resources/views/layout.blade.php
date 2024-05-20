<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>AutoHub - @yield('title')</title>
</head>

<body class="bg-darker text-white">
    <header class="flex items-center lg:gap-6 lg:px-20 px-5 pt-6 lg:justify-normal justify-between">
        <h1 class="text-xl text-white">
            Auto
            <span class="bg-primary text-darker font-bold px-2 rounded-md">hub</span>
        </h1>

        <button class="block lg:hidden text-2xl">
            <ion-icon name="menu-sharp"></ion-icon>
        </button>

        <div class="hidden lg:flex flex-grow items-center justify-between">
            <nav>
                <ul class="flex items-center gap-6 text-xl">
                    <li><a href="{{ route('home') }}"
                            class="{{ Route::is('home') ? 'text-white underline' : 'text-gray' }}">Home</a></li>
                    <li><a href="{{ route('home') }}"
                            class="{{ Route::is('cars') ? 'text-white underline' : 'text-gray' }}">Cars</a></li>
                </ul>
            </nav>
            <nav>
                <ul class="flex items-center gap-6">
                    <li>
                        <a href="{{ route('home') }}"
                            class="{{ Route::is('cart') ? 'text-darker bg-white' : 'bg-primary text-darker' }} rounded-full p-2 flex items-center"><ion-icon
                                name="cart-sharp" class="text-xl"></ion-icon></a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}"
                            class="{{ Route::is('profile') ? 'text-darker bg-white' : 'bg-primary text-darker' }} rounded-full p-2 flex items-center"><ion-icon
                                name="person-sharp" class="text-xl"></ion-icon></a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="mt-20">@yield('content')</main>

    <footer></footer>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>
