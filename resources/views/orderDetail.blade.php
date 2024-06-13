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
    <aside class="h-screen w-1/6 sticky top-0 bg-[#7EBEE0] flex flex-col justify-between items-center py-10">
        <div class="flex flex-col gap-4">
            <h1 class="text-neutral-50 text-4xl font-bold">Pick<span class="text-blue-600">UB</span> </h1>
            <ul class="flex flex-col text-base font-semibold text-black ">
                <p class="py-1 px-4 rounded-3xl hover:bg-white duration-200 ease-in-out"><a
                        href="{{ route('dashboard') }}">Dashboard</a></p>
                <p class="py-1 px-4 rounded-3xl hover:bg-white duration-200 ease-in-out"><a
                        href="{{ route('orderList') }}">Orderan</a></p>
            </ul>
        </div>

        <ul class="flex flex-col gap-2 text-base font-semibold text-black ">
            <p>Help & Support</p>
            <p>Setting</p>
        </ul>
    </aside>
    <main class="w-full bg-neutral-50">
        <nav class="w-full justify-between flex items-center py-4 px-3">
            <h1 class="text-2xl font-black">Hallo {{ Auth::user()->name }}</h1>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
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
        <section class="w-5/6 mx-auto flex py-10">
            <div  class="w-5/6">
                <h1 class="text-4xl font-bold">Detail Pesanan</h1>
                <div class="flex gap-5 mt-10">
                    <div class="w-2/6 border-2 border-gray-500 rounded-lg">
                        <div class="border-b-2 border-gray-500 flex flex-col gap-2 p-5">
                            <p>Dipesan oleh</p>
                            <h3 class="text-3xl font-bold text-green-400">{{ $order->user->name }}</h3>
                        </div>
                        <h1 class="text-sm p-5 ">{{ date('j F Y, H:i', strtotime($order->created_at)) }}</h1>
    
                    </div>
                    <div class="w-2/6 border-2 border-gray-500 rounded-lg px-5 py-2">
                        <h1 class="text-lg font-semibold">Alamat</h1>
                        <p class="text-sm">
                            {{ $order->alamat }}
                        </p>
                    </div>
    
                </div>
                <div class=" border-2 w-fit border-gray-500 rounded-lg  mt-10">
                    <h1 class="text-xl px-5 font-semibold">Detail Menu</h1>
                    <p class="text-sm px-5">
                        {{ $order->alamat }}
                    </p>
                    <div class="grid-cols-1 gap-5 divide-y-2 divide-gray-500">
                       @foreach ($order->orderItems as $item)
                           <div class="p-5 flex gap-3">
                                <img src="{{$item->makanan->gambar}}" class="w-72 object-cover aspect-[8/6]" alt="gambar">
                                <div class="w-2/5">
                                    <h1 class="text-xl font-semibold">{{$item->makanan->nama}}</h1>
                                    <p class=" text-sm">{{$item->makanan->deskripsi}}</p>
                                </div>
                                <div class="flex w-1/5 gap-2">
                                    <p class="font-bold">Rp {{$item->makanan->harga * $item->kuantiti}}</p>
                                    <p>X {{$item->kuantiti}}</p>
    
                                </div>
                           </div>
                       @endforeach
                       <table class="w-full">
                            <tbody>
                                <tr class="">
                                    <td class="w-4/5 px-5 py-2">Total</td>
                          
                                    <td class="w-1/5 px-5">Rp {{$totalHarga}}</td>
                                </tr>
                            </tbody>
                       </table>
    
                    </div>
                </div>
            </div>
            <div class="self-end">
              
                @if ($order->status ==='masuk')
                <form action="{{ route('pickup', $order->id) }}" method="POST">
                    @csrf
                    <button class="text-xl font-semibold text-white bg-blue-300 py-3 rounded-lg px-4" type="submit">Pick Up</button>
                </form>
                @endif
                @if ($order->status ==='proses')  
                    <form action="{{ route('batal', $order->id) }}" method="POST">
                        @csrf
                        <button class="text-xl font-semibold text-white bg-red-300 py-3 rounded-lg px-4" type="submit">Batalkan Orderan</button>
                    </form>
                @endif
          
            </div>
  

        </section>


    </main>




</body>

</html>
