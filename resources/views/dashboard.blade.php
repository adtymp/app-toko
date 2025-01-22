<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Selamat Datang') }}
        </h2>
    </x-slot>

            <!--SlideShow-->
            <div>
            <div class="p-16">
                <div class="max-w-4xl mx-auto relative" x-data="{
                    activeSlide: 1,
                    slides: [
                        {id: 1, tittle: 'Gambar 1', body:'Halo Bolo', image: '{{ asset('storage/gambar/gambar1.jpg') }}' },
                        {id: 2, tittle: 'Gambar 2', body:'Halo Nomer 2', image: '{{ asset('storage/gambar/jpy.png') }}' },
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
                                <!-- Bind src to slide.image -->
                                <img :src="slide.image" alt="Gambar Slide" class="w-32 h-32 object-cover rounded-lg">
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
                                <a href="{{route('detail', $product->id)}}">
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
</x-app-layout>
