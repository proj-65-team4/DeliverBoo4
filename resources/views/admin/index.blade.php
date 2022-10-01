@extends('layouts.backend.app')


@section('page_title', "Dashboard")

@section('content')

@if (!Auth::user()->restaurant)
    
<div class="container text-center py-5">

    <h2>Ciao {{ Auth::user()->name }},</h2>
    <p>ci risulta che sul tuo account non c'è alcun ristorante registrato!</p>
    <p>Per sfruttare le varie funzionalità della nostra piattaforma ti suggeriamo di cliccare sul pulsante "Aggiungi Ristorante".</p>
    
    <div class="py-5">
        <a href="{{ route("admin.restaurant.create", Auth::user()->id) }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Aggiungi Ristorante</a>
    </div>
</div>
    

@else
    


<div class="cards">

    <div class="card-single">
        <div>
            {{-- INSERIRE NUMERO TOTALE PRODOTTI --}}
            <h1>{{$totalProducts}}</h1>
            <span>Prodotti</span>
        </div>

        <div>
            <span class="las la-hamburger"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            {{-- INSERIRE NUMERO TOTALE DEGLI ORDINI --}}
            <h1>{{ count($orders) }}</h1>
            <span>Ordini</span>
        </div>

        <div>
            <span class="las la-shopping-bag"></span>
        </div>
    </div>

</div>

{{-- TABELLA CON I PRODOTTI RECENTEMENTE AGGIUNTI --}}
{{-- ORDINE CRONOLOGICO A PARTIRE DAL PIù RECENTE (VEDERE DATA CREAZIONE) --}}
{{-- DATI DA RIPORTARE NAME VISIBLE E AVAILABLE --}}
<div class="recent-grid">

    <div class="orders">
        <div class="card">
            <div class="card-header">
                <h3>Ordini Recenti</h3>

                <a href="{{route('admin.orders.index')}}" class="btn">Vedi tutti <span class="las la-arrow-right"></span></a>
            </div>

            <div class="card-body">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Data ordine <i class="fa-regular fa-calendar-days"></i></td>
                            <td>Nome <i class="fa-regular fa-calendar-days"></i></td>
                            <td>Subtotale <i class="fa-regular fa-credit-card"></i></td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->date_order ? date("d-m-Y h:m", strtotime($order->date_order)) : 'Nessun ordine effettuato' }}</td>
                            <td>{{ $order->customer_name}}</td>
                            <td>€ {{ $order->subtotal ? $order->subtotal : '' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="card">
            <div class="card-header">
                <h3>Prodotti recenti</h3>

                <a href="{{route('admin.products.index')}}" class="btn" role="button">Vedi tutti <span class="las la-arrow-right"></span></a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td id="disp">Disponibilità</td>
                                {{-- <td>Visibile</td> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- CICLARE PER VISUALIZZARE I DATI DEI PIATTI --}}
                            @foreach ($dataProducts as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td id="disp"><span class="status {{$product->available == 0 ? 'status-false' : 'status-true'}}"></span><span class="text-status">{{$product->available ? 'Disponibile' : 'Non Disponibile'}}</span></td>
                                {{-- <td><span class="status {{$product->visible == 0 ? 'status-false' : 'status-true'}}"></span><span class="text-status">{{$product->visible ? 'Visibile' : 'Non Visibile'}}</span></td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- TABELLA ORDINI --}}
    {{-- <div class="orders">
        <div class="card">
            <div class="card-header">
                <h3>Ordini Recenti</h3>

                <a href="{{route('admin.orders.index')}}" class="btn">Vedi tutti <span class="las la-arrow-right"></span></a>
            </div>

            <div class="card-body">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Data ordine <i class="fa-regular fa-calendar-days"></i></td>
                            <td>Subtotale <i class="fa-regular fa-credit-card"></i></td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->date_order ? $order->date_order : 'Nessun ordine effettuato' }}</td>
                            <td>€ {{ $order->subtotal ? $order->subtotal : '' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

</div>
@endif
@endsection