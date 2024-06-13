<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex">
    <aside class="h-screen w-1/6 bg-[#7EBEE0] flex flex-col justify-between items-center py-10">
        <div class="flex flex-col gap-4">
            <h1 class="text-neutral-50 text-4xl font-bold">Pick<span class="text-blue-600">UB</span> </h1>
            <ul class="flex flex-col text-base font-semibold text-black ">
                <p class="py-1 px-4 rounded-3xl hover:bg-white duration-200 ease-in-out"><a href="{{route('dashboard')}}">Dashboard</a></p>
                <p class="py-1 px-4 rounded-3xl hover:bg-white duration-200 ease-in-out"><a href="{{route('orderList')}}">Orderan</a></p>
            </ul>
        </div>

        <ul class="flex flex-col gap-2 text-base font-semibold text-black ">
            <p>Help & Support</p>
            <p>Setting</p>
        </ul>
    </aside>
    <main class="w-full bg-neutral-50">
        <nav class="w-full justify-between flex items-center py-4 px-3">
            <h1 class="text-2xl font-black">Hallo {{Auth::user()->name}}</h1>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>

        </nav>

    <h1>ini dashboard</h1>
    </main>




</body>

</html>
