<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{env('APP_NAME')}}</title>
</head>

<body class="antialiased">
    <header>
        <nav class="bg-gray-50 dark:bg-gray-900 opacity-60">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="{{route('welcome')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
                   <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MyFreela</span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="{{route('welcome')}}"
                                class="block py-2 px-3 text-gray-900 bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Sobre</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-900 dark:text-gray-500 underline">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-900 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-900 dark:text-gray-500 underline">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </nav>
    </header>

    <div class="max-w-screen max-h-screen bg-cover bg-no-repeat flex align-items-center align-content-center"
        style="opacity: 0.8; background-image: url({{url('assets/img/cozinha.jpg')}})">
        <section class="flex flex-col align-content-center justify-evenly ">
            <div class="text-center text-amber-500 text-5xl font-extrabold font-['Montserrat'] bg-opacity-100 mt-10">
                Freelance
                simplificado para todos</div>
            <div class="text-center text-amber-500 text-2xl font-extrabold font-['Montserrat'] bg-opacity-100">Encontre
                trabalho extra sem sair de casa.</div>

            <div class="m-10 text-center text-black text-2xl font-normal font-['Montserrat']">Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Non dolorem facilis iure libero tenetur autem ipsum ea! Deserunt, sapiente
                voluptatum repudiandae eos recusandae, ipsa atque animi pariatur amet minima neque. Lorem ipsum dolor
                sit amet consectetur adipisicing elit. Minus ipsam itaque commodi, repellat cum neque quis ullam id,
                atque possimus, est numquam facere dolore adipisci ipsa laborum minima unde. Pariatur?</div>

            <div class="h-96">

            </div>

            <a href="http://myfreela.test/register" class="mx-auto">
                <button class="text-center w-[248px] h-[52px] bg-amber-500 rounded-[5px] p-3 text-white">Faça já
                    seu
                    Cadastro</button>
            </a>
            <div class="text-center max-w-6xl mx-auto sm:px-6 lg:px-8 m-10">
                <h2 class="mx-auto mt-4 w-64 text-lg bg-white">Depoimentos:</h2>
                <div class="flex justify-center align-content-center sm:justify-start sm:pt-0 bg-gray-50 rounded">

                    <div class="m-4 w-64 h-64 bg-gray-50 shadow rounded flex justify-center p-4">

                        <img src="{{url('assets/img/no-photo.png')}}" alt="" class="w-20 h-20 rounded-full">
                        <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime eveniet
                            est in eligendi tempore itaque ab nulla.</p>
                    </div>
                    <div class="m-4 w-64 h-64 bg-gray-50 shadow rounded flex justify-center p-4">
                        <img src="{{url('assets/img/no-photo.png')}}" alt="" class="w-20 h-20 rounded-full">
                        <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime eveniet
                            est in eligendi tempore itaque ab nulla.</p>
                    </div>
                    <div class="m-4 w-64 h-64 bg-gray-50 shadow rounded flex justify-center p-4">
                        <img src="{{url('assets/img/no-photo.png')}}" alt="" class="w-20 h-20 rounded-full">
                        <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime eveniet
                            est in eligendi tempore itaque ab nulla.</p>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <footer class="w-full bg-white rounded-lg  m-4 dark:bg-gray-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/"
                    class="hover:underline">myFreela™</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>
