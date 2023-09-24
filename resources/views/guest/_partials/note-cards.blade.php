<div class="card p-3">
    <figure class="p-3 mb-0">
        <blockquote class="blockquote">
            <p>{{ $card->title }}</p>
        </blockquote>
        <figcaption class="blockquote-footer mb-0 text-muted">
            <cite>{{ $card->info }}</cite>
        </figcaption>
    </figure>
    @include('guest._partials.footer-cards')
</div>