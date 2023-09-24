<p class="m-0 p-0">
    <small class="text-muted m-3">
        <a href="{{ route('guest.tip-show', $card->category->name) }}">
            Tip de {{ ucfirst($card->category->name) }}
        </a>
    </small>
</p>