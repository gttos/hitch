@extends('auth/layouts/contentNavbarLayout')

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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.card-index') }}">
                        <i class="bx bx-bell me-1"></i>Voler al Listado
                    </a>
                </li>
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
                                <label for="tip" class="form-label">Tip</label>
                                <input class="form-control" type="text" id="tip" name="tip"
                                       value="{{ $card->tip ?? old('tip') }}" autofocus/>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="explanation" class="form-label">Explicación</label>
                                <textarea class="form-control" type="text" name="explanation"
                                          id="explanation">{{ $card->explanation ?? old('explanation') }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="category_id" class="form-label">Categoría</label>
                                <select id="category_id" name="category_id" class="select2 form-select">
                                    <option value="">Seleccionar Categoría</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == ($card->category_id ?? old('category_id')) ? 'selected' : '' }}>{{ ucfirst($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="is_approved" class="form-label">Aprobado</label>
                                <select id="is_approved" name="is_approved" class="select2 form-select">
                                    <option value="0" {{ $card->is_approved == 0 ? 'selected' : '' }}>
                                        Si
                                    </option>
                                    <option value="1" {{ $card->is_approved == 1 ? 'selected' : '' }}>
                                        No
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="tags" class="form-label">Tags</label>
                            <input class="form-control" type="text" id="tags" name="tags"
                                   value="@if($card->tags != null)@foreach($card->tags as $tag){{$tag->name}}@if(!$loop->last),@endif @endforeach @endif"
                                   autofocus/>
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
