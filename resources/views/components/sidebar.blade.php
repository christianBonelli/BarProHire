
<nav class="flex justify-center gap-4 border-t border-gray-200 bg-white/50 p-2.5
mt-32 shadow-lg backdrop-blur-lg dark:border-slate-600/60 dark:bg-slate-800/50
 top-0  min-w-[256px] w-full max-w-xl mx-auto rounded-lg border">
    <x-navLink
        href="/posts/create" :active="request()->is('posts/create')"
    >

        <img src="{{ asset('images\drink.svg') }}" alt="Crea un Post" class="w-7 h-7">

        <small class="text-center text-xs font-medium"> Crea un Post </small>
    </x-navLink>

    <x-navLink
        href="{{ route('users.show', Auth::user()) }}" :active="request()->is('users/' . Auth::id())"
        class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-slate-800"
    >
        <img src="{{ asset('images\list.svg') }}" alt="Lista dei post" class="w-7 h-7">

        <small class="text-center text-xs font-medium"> Lista dei post</small>
    </x-navLink>

    <x-navLink
        href="{{route('auth.profile', Auth::user())}}" :active="request()->routeIs('auth.profile')"
        class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-slate-800"
    >
    <img src="{{ asset('images\profile.svg') }}" alt="Profilo" class="w-8 h-8">

        <small class="text-center text-s font-medium"> Profilo </small>
    </x-navLink>



    <x-navLink
        href="/"
        class="flex h-16 w-16 flex-col items-center justify-center gap-1 text-fuchsia-900 dark:text-gray-400"
    >
        <img src="{{ asset('images\home.svg') }}" alt="Custom Icon" class="w-8 h-8">

        <small className="text-s font-medium">Home</small>
    </x-navLink>
    </nav>

