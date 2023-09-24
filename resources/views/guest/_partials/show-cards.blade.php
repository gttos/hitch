@foreach($cards as $card)
    <div class="col-sm-6 col-lg-4 mb-4">
        @if( 'note' === $card->type )
            @include('guest._partials.note-cards')
        @elseif('app' === $card->type )
            @include('guest._partials.app-cards')
        @endif
    </div>
@endforeach