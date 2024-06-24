<x-layout>

<!-- Profilo -->
<div class="max-w-4xl mx-auto p-4  mt-6">
    <!-- Header -->
    <div class="flex items-center space-x-6">
        <img src="{{ $user->profilePic ? asset($user->profilePic) : asset('images/defaultImage.webp') }}" alt="Immagine Profilo" class="w-24 h-24 rounded-full object-cover">
        <div>
            <h1 class="text-2xl font-bold uppercase">{{$user->name}} {{$user->lastName}}</h1>
        </div>
    </div>

    <!-- Bio -->
    <div class="mt-4">
        <h2 class="text-xl  text-orangeBurn font-semibold">Bio</h2>
        <p class="text-white mt-2">{{$user->description}}</p>
    </div>

    <div class="flex items-center mt-6">
        <button class="px-8 py-2 bg-orangeBurn text-white text-l font-medium rounded hover:bg-orange-400 focus:outline-none focus:bg-indigo-500">Contattami</button>
        </button>
    </div>


    <!-- Feed -->
    <div class="mt-6">
        <h2 class="text-xl  text-orangeBurn font-semibold mb-4">Post Recenti</h2>
        @auth
            <p>Qui troverai tutte le foto postate da te. Questo messaggio sarà visibile solo a te.</p>
        @endauth
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            @foreach ($posts as $post)
            @foreach ($post->photos as $photo)
            <div class="relative overflow-hidden group">
                <img src="{{ asset($photo->path) }}" alt="Post Image" class="w-full h-full object-cover rounded-lg transition duration-300 transform group-hover:scale-110">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <img src="{{ asset($photo->path) }}" alt="Post Image" class="absolute inset-0 w-full h-full  sm:h-full object-cover"
                    onclick="openImageModal('{{ asset($photo->path) }}', '{{ $photo->id }}')">
                </div>
            </div>
            @endforeach
        @endforeach

        </div>
    </div>
</div>

<x-footer></x-footer>
</x-layout>

<script>
    function openImageModal(imagePath, photoId) {
    let overlay = document.createElement('div');
    overlay.classList.add('fixed', 'inset-0', 'bg-black', 'bg-opacity-50', 'flex', 'items-center', 'justify-center', 'z-50');

    let modalImage = document.createElement('img');
    modalImage.src = imagePath;
    modalImage.alt = 'Dettaglio immagine';
    modalImage.classList.add('max-w-200', 'max-h-300');

    overlay.appendChild(modalImage);

    document.body.appendChild(overlay);

    overlay.addEventListener('click', function() {
        overlay.remove();
    });
}
</script>
