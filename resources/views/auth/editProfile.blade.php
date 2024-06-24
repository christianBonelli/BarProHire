<x-layout>
    <x-formComp.sectionForm>
        <x-formComp.header>
        Modifica i tuoi dati
        </x-formComp.header>
         <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data"   class="max-w-md w-full bg-white rounded p-6 mb-5 ">
             @csrf
             @method('PATCH')
             <div class="space-y-4 ">
                    <img src="{{ $user->profilePic ? asset($user->profilePic) : asset('images/defaultImage.webp') }}" alt="Immagine Profilo" class="w-24 h-24 object-cover rounded-full">
                    <label  class="text-black" for="">Aggiorna la tua foto Profilo</label>
                 <x-formComp.input type="file" name="profilePic"></x-formComp.input>
                 @error('profilePic')
                 <span class="text-red-500">L'immagine non deve superare i 2 MB</span>
                 @enderror
                 <x-formComp.input class="text-black" name="name" value="{{$user->name}}"></x-formComp.input>
                 <x-formComp.input class="text-black" name="lastName" value="{{$user->lastName}}"></x-formComp.input>
                 <textarea class="w-full p-4 text-m bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                    name="description"  id="description" placeholder="Inserisci una descrizione di chi sei"
                    cols="50" rows="5" maxlength="300">{{$user->description}}</textarea>
                    <p id="charCount" class="text-right text-sm text-gray-500 mt-1">0/300 caratteri</p>
                 <x-formComp.input type="date" class="text-black" name="dateOfBirth" value="{{$user->dateOfBirth}}"></x-formComp.input>
                 <x-formComp.input class="text-black" name="email" value="{{$user->email}}"></x-formComp.input>

             </div>
             <div>
                <button class="mt-4 w-full py-4 bg-blue-600 hover:bg-blue-700 rounded text-l font-bold text-gray-50 transition duration-200">Salva</button>
                <a href="/users/{{$user->id}}/profile" class=" mt-4 w-full py-4 bg-red-600 hover:bg-red-700 rounded text-l font-bold text-gray-50 flex items-center justify-center transition duration-200">
                    Torna Indietro
                </a>
            </div>
            </form>
     </x-formComp.sectionForm>
</x-layout>
