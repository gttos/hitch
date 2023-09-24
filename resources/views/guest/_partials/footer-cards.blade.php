<p class="card-text">
    <small class="text-muted m-3">
        <a href="{{ route('guest.tip-show', $card->category->name) }}">
            Tip de {{ ucfirst($card->category->name) }}
        </a>
    </small>
</p>
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

        <div class="card-body">
            <div class="row gy-3">
                <form method="POST" action="{{ route('auth.rate-card', $card->id) }}">
                    @csrf
                    <div class="col-md">
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="value"
                                   id="inlineRadio1" value="1"/>
                            <label class="form-check-label" for="inlineRadio1">
                                <i class="bx bx-like me-1"></i>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="value"
                                   id="inlineRadio2" value="0"/>
                            <label class="form-check-label" for="inlineRadio2">
                                <i class="bx bx-dislike me-1"></i>
                            </label>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Votar</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endauth