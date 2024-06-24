<x-layout>
    {{-- LISTA DEI POST --}}
    <x-sidebar>

    </x-sidebar>
    <div class="mt-4">
        <h2 class="text-3xl font-semibold text-center mb-8">Qui troverai la lista dei tuoi post</h2>
        <div class="m-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($posts as $post)
            <div class="flex flex-col items-center">
                <!-- Contenuto della Card -->
                <x-cardComp.divCard class="w-full flex flex-col justify-between">
                    <div>
                        <div id="carouselExampleControls{{$post->id}}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($post->photos as $photo)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ asset($photo->path) }}" class="block object-cover custom-img-size" alt="Photo">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$post->id}}"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$post->id}}"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="p-3">
                            <h3 class="text-xl font-semibold mb-2 text-black capitalize">{{$post->user->name}} {{$post->user->lastName}}</h3>
                            <p class="text-money mb-2 font-bold">{{$post->salary}}</p>
                            <div class="h-[100px] mb-12">
                                <p class="text-black line-clamp-4">{{$post->description}}</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($post->tags as $tag)
                                <a href="#"
                                    class="bg-blue-100 text-blue-900 hover:bg-blue-400 disabled:opacity-50 text-s px-2 py-1 rounded-full">#{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </x-cardComp.divCard>
                <!-- Bottoni sotto la Card -->
                <div class="w-full flex justify-center space-x-4 mt-4">
                    <a href="/posts/{{$post->id}}/edit" class="w-1/2">
                        <button class="block w-full bg-yellow-400 text-black py-2 px-4 rounded-lg font-semibold hover:bg-yellow-500">
                            Modifica
                        </button>
                    </a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="w-1/2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="block w-full bg-red-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-red-700">
                            Elimina
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>


</x-layout>
