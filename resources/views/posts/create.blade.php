<x-layout>

    <x-sidebar>

    </x-sidebar>
    <x-formComp.sectionForm>
       <x-formComp.header>
        Crea un Post
       </x-formComp.header>
        <form action="/posts" method="POST" enctype="multipart/form-data"   class="max-w-md w-full bg-white rounded p-6 mb-5 ">
            @csrf
            <div class="space-y-4 ">
                <label  class="text-black" >Inserisci la tua paga oraria desiderata:</label>
                <x-formComp.input name="salary" placeholder="15€/h" required></x-formComp.input>

                <div class="mb-6">
                    <label class="text-black" for="description">Inserisci una descrizione di cosa offri e chi sei:</label>
                    <textarea id="description" class="w-full p-4 text-m bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                              name="description" placeholder="Sono un barman esperto in Flair"
                              cols="50" rows="5" maxlength="300" required>{{ old('description') }}</textarea>
                    @error('description')
                        @if($message === 'The description field must not be greater than 254 characters.')
                            <p class="text-red-500 text-xs mt-2">La descrizione non può superare i 300 caratteri. Per favore, riduci il testo.</p>
                        @else
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @endif
                    @enderror
                    <!-- Contatore di caratteri -->
                    <p id="charCount" class="text-right text-sm text-gray-500 mt-1">0/254 caratteri</p>
                </div>
                <label  class="text-black" for="">Inserisci le foto dei tuoi drink</label>
                <x-formComp.input type="file" name="images[]"  multiple></x-formComp.input>

                <label  class="text-black" for="">Inserisci massimo 3 Tag separati da una virgola</label>
                <x-formComp.input type="text" name="tags" placeholder="barlady, flair, cocktailart" required></x-formComp.input>
            </div>
            <div class="flex items-center justify-between mt-4">
                <div class="flex flex-row items-center">
                    <label for="featured" class="ml-2 text-sm font-normal text-gray-600"> Se vuoi sponsorizzare il post sbarra la casella</label>
                    <input type="checkbox"  name="featured" class=" ml-2 focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">

                </div>
            </div>
            <button class="mt-4 w-full py-4 bg-orange-600 hover:bg-orange-700 rounded text-xl uppercase font-bold text-gray-50 transition duration-200">Crea Post</button>
        </form>
    </x-formComp.sectionForm>

</x-layout>
