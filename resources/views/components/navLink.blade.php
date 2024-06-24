@props(['active' => false, 'type' => 'a'])

<a
        class=" {{ $active ? "bg-orangeBurn text-white" : "text-gray-300 hover:bg-gray-500 hover:text-white"}}
        flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5"
        aria-current="{{ $active ? "page" : "false"}}"
        {{$attributes}}
    >
       {{$slot}}
    </a>
