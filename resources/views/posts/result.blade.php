<x-layout>
        <x-formComp.header class="flex items-center ">
            <span class="mr-2">Risultati per il tag:</span>
            <p class="bg-blue-100 text-blue-800 text-s px-4 pb-1 capitalize rounded-full inline-block align-middle hover:bg-blue-200">#{{$tag->name}}</p>
        </x-formComp.header>

    <div class="container mx-auto mb-4 content-wrapper">
        <x-h2 class="text-3xl font-semibold text-center mb-8">Post</x-h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            @foreach ($posts as $post)
            <x-cardComp.divCard class="flex flex-col h-full">
                {{-- CAROUSEL --}}
                <div id="carouselExampleControls{{$post->id}}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if ($post->photos->isEmpty())
                        <!-- Immagine di default se non ci sono foto -->
                        <div class="carousel-item active">
                            <img src="{{ asset('images/cocktailDefault.png') }}" class="block object-cover custom-img-size" alt="Default Photo">
                        </div>
                    @else
                        @foreach ($post->photos as $photo)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset($photo->path) }}" class="block object-cover custom-img-size" alt="Photo">
                        </div>
                        @endforeach
                    @endif
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

                <div class="p-4 flex flex-col flex-grow">
                    <a href="{{ route('singlePost', $post['id'])}}">
                        <h3 class="text-xl font-semibold capitalize mb-2 text-black">{{$post->user->name}} {{$post->user->lastName}}</h3>
                    </a>
                    <p class="text-money mb-2 font-bold">{{$post->salary}}</p>

                    <div id="postDescription{{ $post->id }}" class="relative overflow-hidden text-black flex-grow post-description">
                        <p class="line-clamp-3">{{ $post->description }}</p>
                        <!-- Sfumatura in fondo al testo per indicare che può essere espanso -->
                        <div class="absolute bottom-0 left-0 w-full h-8 bg-gradient-to-t from-white to-transparent pointer-events-none fade-out-effect"></div>
                    </div>
                    <button class="mt-2 text-blue-600 hover:text-blue-800 focus:outline-none toggle-button"
                            onclick="toggleText(this)"
                            data-post-id="{{ $post->id }}">
                        Leggi di più
                    </button>
                </div>
                <div class="flex flex-wrap gap-2 mb-4 justify-center">
                    @foreach ($post->tags as $tag)
                    <a href="/tags/{{ strtolower($tag->name) }}" class="bg-blue-100 text-blue-600 hover:bg-blue-300 disabled:opacity-50 text-xs px-2 py-1 rounded-full">
                        #{{ $tag->name }}
                    </a>
                    @endforeach
                </div>
                <div class="px-4 pb-4">
                    <button class="block w-full bg-orange-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-orange-700">
                        Contatta
                    </button>
                </div>
            </x-cardComp.divCard>
            @endforeach
        </div>
    </div>

<x-footer  class="fixed bottom-0 left-0 right-0">

</x-footer>
</x-layout>
<script>
    function toggleText(button) {
    const postId = button.dataset.postId; // Ottieni l'ID del post dal pulsante
    const post = document.getElementById(`postDescription${postId}`); // Trova il postDescription specifico per questo ID
    const descriptionText = post.querySelector('p');
    const fadeOutEffect = post.querySelector('.fade-out-effect');
    const toggleButton = button;

    // Controlla se il testo è espanso
    if (descriptionText.classList.contains('line-clamp-3')) {
        // Espandi il testo
        post.classList.remove('h-auto');
        descriptionText.classList.remove('line-clamp-3');
        fadeOutEffect.style.display = 'none';
        toggleButton.textContent = 'Leggi meno';
    } else {
        // Riduci il testo
        post.classList.add('h-auto');
        descriptionText.classList.add('line-clamp-3');
        fadeOutEffect.style.display = 'block';
        toggleButton.textContent = 'Leggi di più';
    }
}
</script>
