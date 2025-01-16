<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <main class="profile-page">
        <section class="relative block h-500-px">
        <div class="text-center justify-center absolute top-0 w-full h-full bg-center bg-cover pt-8" style="background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">
            <div class="text-xl font-bold">Welcome To</div>
            <div class="flex justify-center">
            <div class="text-red-700 text-9xl font-bold shadow-sm">SAN</div>
            <div class="text-9xl font-bold">Cloth</div>
            </div>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
            <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        </section>
        <section class="relative py-16 bg-blueGray-200">
            <div class="container mx-auto px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                        <div class="relative">
                        <img alt="..." src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                        <div class="py-6 px-3 mt-32 sm:mt-0">
                        @auth
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button class="bg-red-700 active:bg-red-900 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="submit">Logout</button>
                        </form>
                        @endauth
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 lg:order-1">
                        <div class="flex justify-center py-4 lg:pt-4 pt-8">
                        <div class="mr-4 p-3 text-center">
                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span class="text-sm text-blueGray-400">Friends</span>
                        </div>
                        <div class="mr-4 p-3 text-center">
                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span class="text-sm text-blueGray-400">Photos</span>
                        </div>
                        <div class="lg:mr-4 p-3 text-center">
                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">89</span><span class="text-sm text-blueGray-400">Comments</span>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="text-center mt-12">
                    <h3 class="text-4xl font-semibold leading-normal text-blueGray-700 mb-2">
                        <div class="text-3xl leading-normal mt-0 mb-2 font-bold uppercase">
                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>{{ $nama }}
                        </div>
                        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>{{ $email}}
                        </div>
                        <div class="mb-2 text-blueGray-600 mt-10">
                        "Bio"
                        </div>
                    
                    
                </div>
                </div>
            </div>
            </div>
            <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
                <div class="container mx-auto px-4">
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                    <div class="text-sm text-blueGray-500 font-semibold py-1">
                        Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.
                    </div>
                    </div>
                </div>
                </div>
            </footer>
        </section>

    </main>
</body>
</html>