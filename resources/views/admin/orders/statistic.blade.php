@extends('layouts.backend.app')

@section('page_title', "Statistiche ordini")
    

@section('content')
    <div class="row">
        <div class="col">
            <p>Gli ordini totali sono: <strong>{{ count($orders) }}</strong></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Il totale guadagnato per gli ordini è: <strong>{{ $total }} €</strong></p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <canvas id="myChart"></canvas>
        </div>
    </div>
@endsection