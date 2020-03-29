@extends('layouts.app')

@push('head')
    <!-- Mapbox GL JS -->
    <script src="{{ asset('js/map.js') }}" defer></script>

    <style type="text/css">
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
        #modal {
            z-index: 1;
            position: relative;
            margin: auto;
        }
        #modalbtn {
            z-index: 1;
            position: relative;
            left: .3em;
            top: .3em;
            background: gray;
            color: white;
            border: none;
            height: 3em;
            width: 5em;
            border-radius: .2em;
            font-size: 2em;
            opacity: .3;
            border: 1px solid black;
        }
    </style>
@endpush

@section('content')
    <div id='map'></div>
@endsection