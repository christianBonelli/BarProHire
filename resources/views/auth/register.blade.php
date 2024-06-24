<x-layout>
    <!-- component -->
    <section class="bg-black flex flex-col justify-center items-center ">
        <div class="m-4">

        </div>
        <form action="/register" method="POST" enctype="multipart/form-data" class="max-w-md w-full bg-white rounded p-6 mb-5">
            @csrf
            <div class="mb-4">
                <p class="text-black text-center font-bold">Registrati</p>
            </div>
            <div class="space-y-4">
                    <input name="name" id="name"
                        class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                        type="text" placeholder="Nome" value="{{old('name')}}">

                    <input name="lastName" id="lastName"
                        class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                        type="text" placeholder="Cognome" value="{{old('lastName')}}">

                    <textarea class="w-full p-4 text-m bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                    name="description"  id="description" placeholder="Inserisci una descrizione di chi sei"
                    cols="50" rows="5"  maxlength="300">{{ old('description') }}</textarea>
                    <p id="charCount" class="text-right text-sm text-gray-500 mt-1">0/300 caratteri</p>

                    <label for="dateOfBirth" id="dateOfBirth" class="text-black font-semibold">Data di Nascita</label>
                    <input
                        name="dateOfBirth"
                        id="dateOfBirth"
                        type="date"
                        placeholder="dd-mm-yyyy"
                        class="w-full mt-2 p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600">

                    <label class="text-black">Inserisci la tua foto profilo</label>
                    <input name="profilePic"
                        class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                        type="file"
                        value="{{old('profilePic')}}">

                    @error('profilePic')
                    <span class="text-red-500">L'immagine non deve superare i 2 MB</span>
                    @enderror

                    <input name="email" id="email"
                    class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                    type="email" placeholder="Email">
                    @error('email')
                            <span class="text-red-500">Quetsa email è già stata presa.</span>
                     @enderror

                    <input name="password"
                        class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                        type="password" placeholder="Password">
                        @error('password')
                            <span class="text-red-500">Le due password non combaciano.</span>
                        @enderror

                    <div>
                        <input name="password_confirmation"
                            class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                            type="password" placeholder="Conferma Password">
                            @error('password_confirmation')
                            <span class="text-red-500">{{ $message }}</span>
                             @enderror
                    </div>
                    <button
                        id="register-button" class=" mt-4 w-full py-4 bg-orange-600 hover:bg-orange-700 rounded text-sm font-bold text-gray-50 transition duration-200">Registrati
                        </button>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex flex-row items-center">
                    <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label for="comments" class="ml-2 text-sm font-normal text-gray-600">Remember me</label>
                </div>
                <div>
                    <a class="text-sm text-blue-600 hover:underline" href="#">Forgot password?</a>
                </div>
            </div>
        </form>

    </section>

    <x-footer>

    </x-footer>
</x-layout>


