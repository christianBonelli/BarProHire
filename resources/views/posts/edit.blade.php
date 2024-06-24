<x-layout>

    <x-formComp.sectionForm>

            <x-formComp.header>
                Modifica Post
            </x-formComp.header>
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="max-w-md w-full bg-white rounded p-6 mb-5 ">
            @csrf
            @method('PATCH')
            <div class="space-y-4 ">
                    {{-- <label  class="text-black" for="">Aggiorna la tua foto Profilo</label> --}}
                <x-formComp.input name="salary" value="{{$post->salary}}"></x-formComp.input>
                <textarea class="w-full p-4 text-m bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                    name="description"  id="description" placeholder="Inserisci una descrizione di chi sei"
                    cols="50" rows="5" maxlength="300">{{$post->description}}</textarea>
                <x-formComp.input class="text-black" name="tags" value="{{ implode(', ', $post->tags->pluck('name')->toArray()) }}"></x-formComp.input>
            </div>
            <div>
                <button class="mt-4 w-full py-4 bg-blue-600 hover:bg-blue-700 rounded text-l font-bold text-gray-50 transition duration-200">Salva</button>
                <a href="{{ route('users.show', Auth::user()) }}" class=" mt-4 w-full py-4 bg-red-600 hover:bg-red-700 rounded text-l font-bold text-gray-50 flex items-center justify-center transition duration-200">
                    Torna Indietro
                </a>
            </div>
            </form>

            <x-formComp.header>
            Le tue foto
        </x-formComp.header>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($post->photos as $photo)
                <div class="flex flex-col items-center">
                    <!-- Contenitore per la foto con dimensioni fisse -->
                    <div class="w-80 h-60 bg-gray-100 flex items-center justify-center overflow-hidden rounded-lg">
                        <img src="{{ asset($photo->path) }}" class="w-full h-full object-cover" alt="Foto">
                    </div>
                    <!-- Pulsante Elimina centrato sotto la foto -->
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition duration-200">Elimina</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </x-formComp.sectionForm>
</x-layout>
