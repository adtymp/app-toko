<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Dashboard</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800" x-data="{ isOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-2">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <a href="/dashboard" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 flex">
                                <div class="text-red-700 text-3xl font-bold">SAN</div>
                                <div class="text-3xl font-bold">Cloth</div>
                            </a>
                            <!-- <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company"> -->
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Hot News</a>
                                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Men</a>
                                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Women</a>
                                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About Me</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <div class="px-6">
                                <form role="search">
                                    <input class="outline-none border-1 rounded-s p-1" type="search" placeholder="Search">
                                    <button class="bg-red-700 border-red-700 text-white rounded-e p-1 hover:bg-red-800" type="submit">Search</button>
                                </form>
                            </div>

                            <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <div class="">
                                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                    </svg>
                                </div>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="relative inline-block ml-3">
                                <div>
                                    <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm hover:ring-2 hover:ring-white z-10" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                                        </svg>

                                    </button>
                                </div>
                                <div x-show="isOpen"
                                    x-transition:enter="transition ease-out duration-100 transform"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75 transform"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white z-50 ring-1 ring-black/5 focus:outline-none"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="user-menu-button"
                                    tabindex="-1">

                                    <!-- Your Profile -->
                                    @auth
                                        @php
                                            $user = Auth::user();
                                        @endphp

                                        @if ($user->kategori === 'customer')
                                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Your Profile</a>
                                        @elseif ($user->kategori === 'partner')
                                            <a href="{{ route('ppartner') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Your Profile</a>
                                        @endif 
                                    @else
                                        <a href="{{ route('partner') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Login</a>
                                    @endauth

                                    <!-- Settings -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Settings</a>

                                    <!-- Logout -->
                                    @auth
                                    <form method="POST" action="{{ route('logout') }}" class="block">
                                        @csrf
                                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700 w-full text-left" role="menuitem" tabindex="-1">Sign out</button>
                                    </form>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div x-show="isOpen" class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <!-- <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a> -->
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Hot News</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Men</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Women</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About Me</a>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="shrink-0">
                            <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base/5 font-medium text-white">Tom Cook</div>
                            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                        </div>
                        <button type="button" class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        @auth
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Your Profile</a>
                        @else
                            <a href="{{ route('partner') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Login</a>
                        @endauth
                        <!-- Settings -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Settings</a>
                        <!-- Logout -->
                        @auth
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 w-full text-left" role="menuitem" tabindex="-1">Sign out</button>
                        </form>
                        @endauth

                    </div>
                </div>
            </div>
        </nav>
        <h3>Selamat Datang</h3>
        <!--SlideShow-->
        <div>
            <div class="p-16">
                <div class="max-w-4xl mx-auto relative" x-data="{
                    activeSlide: 1,
                    slides: [
                        {id: 1, tittle: 'Gambar 1', body:'Halo Bolo'},
                        {id: 2, tittle: 'Gambar 2', body:'Halo Nomer 2'},
                        {id: 3, tittle: 'Gambar 3', body:'Halo Nomer 3'},
                        {id: 4, tittle: 'Gambar 4', body:'Halo Nomer 4'},
                        {id: 5, tittle: 'Gambar 5', body:'Halo Nomer 5'},
                        ],
                        loop(){
                            setInterval(() => this.activeSlide = this.activeSlide === 5 ? 1 : this.activeSlide + 1, 4000)
                        }
                    }"
                    x-init="loop">
                    <template x-for="slide in slides" :key="slide.id">
                        <div x-show="activeSlide === slide.id" class="p-24 h-80 flex items-center bg-slate-500 text-white rounded-lg">
                            <div>
                                <h2 class="font-bold text-2xl" x-text="slide.tittle"></h2>
                                <p class="text-base" x-text="slide.body"></p>
                            </div>
                        </div>
                    </template>

                    <div class="absolute inset-0 flex">
                        <div class="flex items-center justify-start w-1/2">
                            <button @click="activeSlide = activeSlide === 1 ? slides.length : activeSlide -1"
                                class="bg-slate-100 text-slate-500 hover:bg-red-700 hover:text-white transition font-bold rounded-full w-12 h-12 shadow flex justify-center items-center -ml-16">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex items-center justify-end w-1/2">
                            <button @click="activeSlide = activeSlide === slides.length ? 1 : activeSlide +1"
                                class="bg-slate-100 text-slate-500 hover:bg-red-700 hover:text-white transition font-bold rounded-full w-12 h-12 shadow flex justify-center items-center -mr-16">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="absolute w-full flex items-center justify-center px-4">
                        <template x-for="slide in slides" :key="slide.id">
                            <button class="flex-1 w-4 h-2 mt-4 mx-2 mb-2 overflow-hidden rounded-full transition-colors duration-200 ease-out hover:bg-red-900 hover:shadow-lg"
                                :class="{
                                'bg-red-700' : activeSlide === slide.id,
                                'bg-slate-300' : activeSlide !== slide.id,
                            }"
                                @click="activeSlide = slide.id"></button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <!--SlideShow-->
        <header class="bg-white shadow">
            <main>
                <div class="mx-auto max-w-7xl px-20 py-6 sm:px-6 lg:px-12 flex justify-between">
                    <h3 class="text-3xl font-bold tracking-tight text-gray-900">Cloth</h3>
                    <a class="" href="#">Show All</a>
                </div>
                <div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 py-1">
                        @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow duration-300">
                            <div class="relative">
                                <a href="#">
                                    <img
                                        class="w-full h-40 object-cover"
                                        src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}"
                                        alt="{{ $product->nama_produk }}">
                                </a>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900 mt-2">{{$product->nama_produk}}</h3>
                            <div class="flex items-center justify-between mt-3">
                                <span class="text-primary font-bold text-base">Rp. {{$product->price}}</span>
                                <button class="bg-red-700 text-white py-1 px-3 rounded-full hover:bg-red-900 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-auto max-w-7xl px-20 py-6 sm:px-6 lg:px-12 flex justify-between">
                    <h3 class="text-3xl font-bold tracking-tight text-gray-900">Shoes</h3>
                    <a class="" href="#">Show All</a>
                </div>
                <div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 py-1">
                        @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow duration-300">
                            <div class="relative">
                                <a href="#">
                                    <img
                                        class="w-full h-40 object-cover"
                                        src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}"
                                        alt="{{ $product->nama_produk }}">
                                </a>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900 mt-2">{{$product->nama_produk}}</h3>
                            <p class="text-gray-500 text-xs mt-1 line-clamp-2">{{$product->deskripsi}}</p>
                            <div class="flex items-center justify-between mt-3">
                                <span class="text-primary font-bold text-base">Rp. {{$product->price}}</span>
                                <button class="bg-red-700 text-white py-1 px-3 rounded-full hover:bg-red-900 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-auto max-w-7xl px-20 py-6 sm:px-6 lg:px-12 flex justify-between">
                    <h3 class="text-3xl font-bold tracking-tight text-gray-900">Accessories</h3>
                    <a class="" href="#">Show All</a>
                </div>
                <div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 py-1">
                        @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow duration-300">
                            <div class="relative">
                                <a href="#">
                                    <img
                                        class="w-full h-40 object-cover"
                                        src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}"
                                        alt="{{ $product->nama_produk }}">
                                </a>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900 mt-2">{{$product->nama_produk}}</h3>
                            <p class="text-gray-500 text-xs mt-1 line-clamp-2">{{$product->deskripsi}}</p>
                            <div class="flex items-center justify-between mt-3">
                                <span class="text-primary font-bold text-base">Rp. {{$product->price}}</span>
                                <button class="bg-red-700 text-white py-1 px-3 rounded-full hover:bg-red-900 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </header>
    </div>
</body>

</html>