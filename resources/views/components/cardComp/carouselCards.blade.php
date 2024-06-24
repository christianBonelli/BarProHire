@foreach ($post->photos as $photo )
    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
        <img src="{{$photo->path}}" class="block w-full h-auto md:max-w-lg md:max-h-80 object-cover " alt="Drink 1">
    </div>
@endforeach
