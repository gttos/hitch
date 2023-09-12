@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Account Settings /</span> Account
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="firstName" class="form-label">Tip</label>
                                <input class="form-control" type="text" id="firstName" name="firstName" value="{{ $card->title }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Descripción</label>
                                <textarea class="form-control" type="text" name="lastName" id="lastName">{{ $card->content }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="currency" class="form-label">Categoria</label>
                                <select id="currency" class="select2 form-select">
                                    <option value="">Select Currency</option>
                                    @foreach( $categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
