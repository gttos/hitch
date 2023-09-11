@extends('layouts/contentNavbarLayout')

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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Basic</h4>

    <!-- Examples -->
    <div class="row mb-5">
        @foreach($cards as $card)
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card p-3">
                    <figure class="p-3 mb-0">
                        <blockquote class="blockquote">
                            <p>{{ $card->title }}</p>
                        </blockquote>
                        <figcaption class="blockquote-footer mb-0 text-muted">
                            <cite>{{ $card->content }}</cite>
                        </figcaption>
                    </figure>
                </div>
            </div>
        @endforeach
        @foreach($cards as $card)
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->title }}</h5>
                            <p class="card-text">{{ $card->content }}</p>
                            <p class="card-text"><small class="text-muted">Tip de {{ mb_strtoupper($card->category->name) }} - {{ $card->votes }} Votos - {{ $card->rate }} Estrellas </small></p>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    <!--/ Card layout -->
@endsection
