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
    <script src="{{asset('assets/js/card-fav.js')}}"></script>
    <script src="{{asset('assets/js/card-vote.js')}}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tus /</span> Favoritos</h4>

    <!-- Examples -->
    <div class="row mb-5">
        @include('guest._partials.show-cards')
    </div>

    {{ $cards->links() }}
    <!--/ Card layout -->
@endsection
