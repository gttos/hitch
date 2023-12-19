<p class="m-0 p-0">
    <small class="text-muted m-3">
        <a href="{{ route('guest.tip-show', $card->category->slug) }}">
            Tip para {{ ucfirst($card->category->name) }}
        </a>
    </small>
    @auth()
        @if(auth()->user()->favCards->contains('id', $card->id))
            <a class="fav-button cursor-pointer card{{ $card->id }}" data-card-id="{{ $card->id }}"><i
                        class="bx bxs-star me-1"></i></a>
        @else
            <a class="fav-button cursor-pointer card{{ $card->id }}" data-card-id="{{ $card->id }}"><i
                        class="bx bx-star me-1"></i></a>
        @endif
    @endauth
    @guest()
        <a class="fav-button cursor-pointer" href="{{url('login')}}"><i class="bx bx-star me-1"></i></a>
        <a class="fav-button cursor-pointer" href="#{{ $card->slug }}"><i class="bx bx-share-alt me-1"></i></a>
    @endguest
</p>