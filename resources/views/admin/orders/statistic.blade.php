@extends('layouts.backend.app')

@section('page_title', "Statistiche ordini")
    
<<<<<<< HEAD
@section('script')
<script src="{{asset('js/statistic.js')}}" defer></script>
    <script defer>
        
        
        
        const labels = [
            'Gennaio',
            'Febbraio',
            'Marzo',
            'Aprile',
            'Maggio',
            'Giugno',
            'Luglio',
            'Agosto',
            'Settembre',
            'Ottobre',
            'Novembre',
            'Dicembre',
        ];
        console.log({!!count($orders)!!});
        
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [{!!count($orders)!!}],
            }]
        };
        
        const config = {
            type: 'line',
            data: data,
            options: {}
        };
        
       
        </script>
@endsection
=======
>>>>>>> 29d88221f44f976c942bc048088648b184f2bc56

@section('content')
    <div class="row">
        <div class="col">
            <p>Gli ordini totali sono: <strong>{{ count($orders) }}</strong></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Il totale per gli ordini è: <strong>{{ $total }}</strong></p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <canvas id="myChart"></canvas>
        </div>
    </div>
<<<<<<< HEAD


@endsection

=======
@endsection
>>>>>>> 29d88221f44f976c942bc048088648b184f2bc56
