<x-layout>
    <x-sidebar>

    </x-sidebar>
    <div class="mt-3">
        <div class="px-4 sm:px-0">
          <x-formComp.header>I dati del tuo Profilo</x-formComp.header>
        </div>
        <div class="mt-6 border-t border-gray-100">
          <dl class="divide-y divide-gray-100">
            <x-profileComp.divCols>
                <x-profileComp.dt>Foto Profilo</x-profileComp.dt>
                <x-profileComp.dd>
                    <img src="{{ $user->profilePic ? asset($user->profilePic) : asset('images/defaultImage.webp') }}" alt="Foto Profilo" class="w-20 h-20 object-cover rounded-full">
                </x-profileComp.dd>
              </x-profileComp.divCols>

            <x-profileComp.divCols>
              <x-profileComp.dt>Nome Cognome</x-profileComp.dt>
              <dd class="mt-1 capitalize text-sm leading-6 font-medium text-white sm:col-span-2 sm:mt-0">{{$user->name}} {{$user->lastName}}</dd>
            </x-profileComp.divCols>

            <x-profileComp.divCols>
              <x-profileComp.dt>Email</x-profileComp.dt>
              <x-profileComp.dd>{{$user->email}}</x-profileComp.dd>
            </x-profileComp.divCols>

            <x-profileComp.divCols>
                <x-profileComp.dt>Data di nascita(YYYY-MM-GG)</x-profileComp.dt>
                <x-profileComp.dd>{{$user->dateOfBirth}}</x-profileComp.dd>
              </x-profileComp.divCols>

            <x-profileComp.divCols>
              <x-profileComp.dt>Descrizione</x-profileComp.dt>
              <x-profileComp.dd>{{$user->description}}</x-profileComp.dd>
            </x-profileComp.divCols>


            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
                <div class="sm:col-start-2">
                <a href="/user/{{$user->id}}/edit">
                    <button
                        class="block w-full bg-yellow-400 text-black py-2 px-4 rounded-lg font-semibold hover:bg-yellow-500 mt-2 sm:mt-0 ">
                        Modifica i tuoi dati
                    </button>
                </a>
                </div>
                <div class="mt-2">
                <button form="user-delete" id="delete-button"
                    class="block w-full bg-red-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-red-700 ">
                    Elimina
                </button>
                </div>
            </div>
          </dl>
        </div>
      </div>

      <form action="{{ route('user.destroy', $user) }}" class="hidden" id="user-delete" method="POST">
        @csrf
        @method('DELETE')
      </form>

</x-layout>
<script>
    document.getElementById('delete-button').addEventListener('click', function (event) {
        event.preventDefault(); // Evita che il pulsante invii subito il modulo

        Swal.fire({
            title: 'Sei sicuro?',
            text: 'Questa azione eliminerà il tuo account in modo permanente. Non puoi annullarla!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sì, elimina',
            cancelButtonText: 'Annulla'
        }).then((result) => {
            if (result.isConfirmed) {
                // Se l'utente conferma, invia il modulo
                document.getElementById('user-delete').submit();
            }
        });
    });
</script>
