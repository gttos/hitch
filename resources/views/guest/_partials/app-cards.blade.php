<div class="card p-3">
    @include('guest._partials.header-cards')
    <img class="card-img-top p-3 mb-0" src="{{asset('assets/img/01HAMYXWNSAVN46GTMNFSTQ4C7.png')}}"
         alt="Card image cap"/>
    <figure class="p-3 mb-0">
        @if( 'note' === $card->type )
            <blockquote class="blockquote">
                <p>{{ $card->title }}</p>
            </blockquote>
        @endif
        <figcaption class="blockquote-footer mb-0 text-muted">
            <cite>{{ $card->info }}</cite>
        </figcaption>
    </figure>
    @include('guest._partials.footer-cards')
</div>
