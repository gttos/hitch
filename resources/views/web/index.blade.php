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
        @foreach($posts as $post)
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card p-3">
                    <figure class="p-3 mb-0">
                        <blockquote class="blockquote">
                            <p>{{ $post->title }}</p>
                        </blockquote>
                        <figcaption class="blockquote-footer mb-0 text-muted">
                            {{$post->content}}</cite>
                        </figcaption>
                    </figure>
                </div>
            </div>
        @endforeach
    </div>
    <!--/ Card layout -->
@endsection
