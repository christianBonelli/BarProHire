<x-layout>
    <!-- component -->
    <x-formComp.sectionForm>
        <div class="m-4">
            <h2 class="text-3xl font-semibold text-center">Bentornato Bartender!</h2>
        </div>
        <form action="/login" method="POST" class="max-w-md w-full bg-white rounded p-6 mb-5">
            @csrf
            <div class="mb-4">
                <p class="text-black text-center font-bold">LogIn</p>
            </div>
            <div class="space-y-4">
                <div>
                    <input name="email" id="email" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="email" placeholder="Email">
                </div>
                @error('email')
                <span class="text-red-500">Password o Email sono sbagliati</span>
                 @enderror

                <div>
                    <input name="password" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="password" placeholder="Password">
                </div>
                <button class="mt-4 w-full py-4 bg-orange-600 hover:bg-orange-700 rounded text-sm font-bold text-gray-50 transition duration-200">Log In</button>
            </div>
            <div class="flex items-center justify-between mt-4">
                <div class="flex flex-row items-center">
                    <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label for="comments" class="ml-2 text-sm font-normal text-gray-600">Remember me</label>
                </div>
                <div>
                    <a class="text-sm text-blue-600 hover:underline" href="#">Forgot password?</a>
                </div>
            </div>
        </form>
    </x-formComp.sectionForm>

    <x-footer>
        <!-- Contenuto del footer -->
    </x-footer>
</x-layout>
