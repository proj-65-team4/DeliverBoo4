@extends('layouts.backend.app')

@section('page_title', "Statistiche ordini")
    


@section('content')
    <div class="row">
        <div class="col">
            <p>Gli ordini totali sono: <strong>{{count($orders)}}</strong></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Il totale guadagnato per gli ordini è: <strong>{{$total}} €</strong></p>
        </div>
    </div>


    <canvas id="myChart" width="800" height="300"></canvas>

    
@endsection

@section('script')

<script >


    const orders = {!! json_encode($num_orders->toArray()) !!};
        
        
        const tot_ordini = [];
        const labels = [];
        orders.forEach(element => {
            console.log(element);
            labels.push(element.date)
            tot_ordini.push(element.count);
        });
        
        console.log(labels);
        console.log(tot_ordini);
       
       
       
       const data = {
        labels: labels,
        datasets: [{
            label: 'Numero di ordini per giorno',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: tot_ordini ,
        }]
       };
       
       const config = {
        type: 'line',
        data: data,
        options: {}
       };
       
       
       new Chart(
        document.getElementById('myChart'),
        config
       );
    
    
    </script>

@endsection