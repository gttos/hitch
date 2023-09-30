@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
    @include('auth._partials.errors')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Cards /</span> Edición
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link" href="{{ route('auth.card-index') }}"><i class="bx bx-bell me-1"></i>Voler al Listado</a></li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Detalles</h5>
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{ route('auth.card-update', $card->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="title" class="form-label">Tip</label>
                                <input class="form-control" type="text" id="title" name="title" value="{{ $card->tip }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="info" class="form-label">Explicación</label>
                                <textarea class="form-control" type="text" name="info" id="info">{{ $card->explanation }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="category_id" class="form-label">Categoría</label>
                                <select id="category_id" name="category_id" class="select2 form-select">
                                    <option value="">Seleccionar  Categoría</option>
                                    @foreach( $categories as $category )
                                        <option value="{{ $category->id }}" {{ $category->id == $card->category_id ? 'selected' : '' }}>{{ ucfirst($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="is_approved" class="form-label">Aprobado</label>
                                <select id="is_approved" name="is_approved" class="select2 form-select">
                                    <option value="0" {{ old('approved') == 0 ? 'selected' : '' }}>Si</option>
                                    <option value="1" {{ old('approved') == 1 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Guardar</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
