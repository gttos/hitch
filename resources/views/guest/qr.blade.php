@extends('template/layouts/blankLayout')

@section('title', 'Error - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection


@section('content')
    <!-- Error -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">Comparte el conocimiento :D</h2>
            <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
            <div class="mt-3">
                <img src="{{asset('assets/img/qrcode_home.es.png')}}" alt="page-misc-error-light" width="500" class="img-fluid">
            </div>
            <a href="{{url('/')}}" class="mt-4 btn btn-primary">Volver</a>
        </div>
    </div>
    <!-- /Error -->
@endsection
