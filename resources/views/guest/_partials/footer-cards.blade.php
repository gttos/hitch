@if($card->rate != null)
    <span class="text-end" href="#">
        <small>
            {{ $card->votes }} Votos <i class="bx bx-minus bx-xxs me-1"></i>
            {{ $card->rate }}% <i class="bx bx-like bx-xxs me-1"></i>
        </small>
    </span>
@endif
@auth()
    @if(auth()->user()->is_admin)
        <a class="text-center p-1 " href="{{ route('auth.card-edit', $card->id) }}">
            <i class="bx bx-edit-alt me-1"></i>Editar
        </a>
    @else
        <div class="card-body text-center">
            <a class="like-button cursor-pointer btn btn-outline-primary" data-card-id="{{ $card->id }}"><i class="bx bx-like me-1"></i></a>
            <a class="dislike-button cursor-pointer btn btn-outline-secondary" data-card-id="{{ $card->id }}"><i class="bx bx-dislike me-1"></i></a>
        </div>
    @endif
@endauth