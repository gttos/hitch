@extends('auth/layouts/contentNavbarLayout')

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
                    <form id="formAccountSettings" method="POST" action="{{ route('auth.user-update', $user->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstname" class="form-label">First Name</label>
                                <input class="form-control" type="text" id="firstname" name="firstname"
                                       value="{{ $user->firstname }}" autofocus/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="lastname" id="lastname"
                                       value="{{ $user->lastname }}"/>
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
