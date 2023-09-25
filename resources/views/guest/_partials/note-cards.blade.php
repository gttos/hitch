<div class="card p-3">
    @include('guest._partials.header-cards')
    <figure class="p-3 mb-0">
        <blockquote class="blockquote">
            <p>{{ $card->tip }}</p>
        </blockquote>
        <figcaption class="blockquote-footer mb-0 text-muted">
            <cite>{{ $card->explanation }}</cite>
        </figcaption>
    </figure>
    @include('guest._partials.footer-cards')
</div>