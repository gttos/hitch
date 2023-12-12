<div class="card p-3" id="{{ $card->slug }}">
    @include('guest._partials.header-cards')
    <figure class="p-3 mb-0">
        <blockquote class="blockquote">
            <p>{{ $card->tip }}</p>
        </blockquote>
        <figcaption class="blockquote-footer mb-0 text-muted">
            <cite>{{ $card->explanation }}</cite>
        </figcaption>
    </figure>
    @if($card->tags != null)
        <figure class="p-3 mb-0">
            <figcaption class="blockquote-footer mb-0 text-muted">
                @foreach($card->tags as $tag)
                    <cite>#<a href="{{ route('guest.tag-show', $tag->slug) }}">{{ ucfirst($tag->slug) }}</a></cite>
                @endforeach
            </figcaption>
        </figure>
    @endif
    @include('guest._partials.footer-cards')
</div>