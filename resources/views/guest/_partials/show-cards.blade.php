@foreach($cards as $card)
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card p-3">
            <figure class="p-3 mb-0">
                <blockquote class="blockquote">
                    <p>{{ $card->title }}</p>
                </blockquote>
                <figcaption class="blockquote-footer mb-0 text-muted">
                    <cite>{{ $card->info }}</cite>
                </figcaption>
            </figure>
            @guest()
                <span class="dropdown-item text-end" href="#">
                            {{ $card->votes }} Votos <i class="bx bx-minus me-1"></i> {{ $card->rate }}% <i
                            class="bx bx-like me-1"></i>
                        </span>
            @endguest
            @auth()
                @if(auth()->user()->is_admin)
                    <a class="dropdown-item text-end" href="{{ route('auth.card-edit', $card->id) }}">
                        <i class="bx bx-edit-alt me-1"></i>Editar
                    </a>
                @else
                    <span class="dropdown-item text-end" href="#">
                                {{ $card->votes }} Votos <i class="bx bx-minus me-1"></i> {{ $card->rate }}% <i
                                class="bx bx-like me-1"></i>
                            </span>

                    <!-- Inline Checkboxes -->
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
                                               id="inlineRadio2" value="2"/>
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
        </div>
    </div>
@endforeach