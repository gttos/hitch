@extends('guest/layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hitch /</span> Consejos Basicos</h4>

    <!-- Examples -->
    <div class="row mb-5">
        @auth()
            @if(auth()->user()->is_admin)
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card p-3">
                        <a class="dropdown-item text-center" href="{{ route('auth.card-create') }}">
                            <i class="bx bx-plus me-1"></i>Agregar
                        </a>
                    </div>
                </div>
            @endif
        @endauth
        @include('guest._partials.show-cards')
    </div>

    <!--/ Card layout -->
@endsection
