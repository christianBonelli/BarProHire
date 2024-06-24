<x-layout>

    <header>
       <x-searchBar>

       </x-searchBar>
    </header>

    <main class="my-8">
        <div class="container mx-auto px-6">
            <div class="md:flex md:items-center">
                {{-- <div class="w-32 h-32 md:w-1/2 lg:h-96"> --}}
                    <div id="carouselExampleControls{{$singlePost->id}}" class="relative carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ( $singlePost->photos as $photo)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ asset($photo->path)}}" class="block object-contain custom-singleImage-size" alt="Drink 1">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev absolute top-1/2 transform -translate-y-1/2 left-0 z-10 " type="button" data-bs-target="#carouselExampleControls{{ $singlePost->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-black bg-opacity-50 rounded-full " aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next absolute top-1/2 transform -translate-y-1/2 right-0 z-10" type="button" data-bs-target="#carouselExampleControls{{ $singlePost->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-black bg-opacity-50 rounded-full " aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                    <div class="flex items-center">
                        <img class="relative inline-block h-28 w-28 rounded-full object-cover object-center"
                             src="{{ $singlePost->user->profilePic ? asset($singlePost->user->profilePic) : asset('images/defaultImage.webp') }}"
                             alt="Profile Picture"/>
                        <div class="ml-4">
                            <a href="/user/{{$singlePost->user->id}}/social"
                               class="text-white font-bold uppercase text-lg"
                               onmouseover="this.classList.add('hover:text-orange-500');"
                               onmouseout="this.classList.remove('hover:text-orange-500');"
                               style="transition: color 0.3s;">
                                {{$singlePost->user->name}} {{$singlePost->user->lastName}}
                            </a>
                            <h2 class="text-white text-base mt-1">Clicca sul nome per vedere il suo profilo Social.</h2>
                        </div>
                    </div>

                    <hr class="my-3">
                    <div class="mt-2">
                        <label class="text-white text-xl">Paga:</label>
                        <div class="flex items-center">
                            <h3 class="mt-2 text-money font-bold">{{$singlePost->salary}}</h3>
                        </div>
                        <label class="text-white text-xl mt-1">Descrizione:</label>
                        <div class="flex items-center mt-1">
                            <h3 class="mt-2">{{$singlePost->description}}</h3>
                        </div>
                        <label class="text-white text-xl mt-2">Tags:</label>
                        <br>
                        <div class="mt-3">
                        @foreach ($singlePost->tags as $tag )
                        <a href="#"
                        class="bg-blue-100 text-blue-600 hover:bg-blue-300 disabled:opacity-50 text-s px-2 py-1 rounded-full">#{{$tag->name}}</a>
                        @endforeach
                        </div>
                    </div>
                    <div class="flex items-center mt-6">
                        <button class="px-12 py-2 bg-orangeBurn text-white text-l uppercase font-bold  rounded hover:bg-orange-500 focus:outline-none focus:bg-indigo-500">Contatta</button>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-footer></x-footer>

</x-layout>
