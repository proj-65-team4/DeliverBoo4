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
            <span>Products</span>
        </div>

        <div>
            <span class="las la-hamburger"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            {{-- INSERIRE NUMERO TOTALE DEGLI ORDINI --}}
            <h1>79</h1>
            <span>Orders</span>
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

    <div class="products">
        <div class="card">
            <div class="card-header">
                <h3>Recent Products</h3>

                <a href="{{route('admin.products.index')}}" class="btn" role="button">See All <span class="las la-arrow-right"></span></a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Available</td>
                                <td>Visible</td>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- CICLARE PER VISUALIZZARE I DATI DEI PIATTI --}}
                            @foreach ($dataProducts as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td><span class="status {{$product->available == 0 ? 'status-false' : 'status-true'}}"></span><span class="text-status">{{$product->available ? 'Disponibile' : 'Non Disponibile'}}</span></td>
                                <td><span class="status {{$product->visible == 0 ? 'status-false' : 'status-true'}}"></span><span class="text-status">{{$product->visible ? 'Visibile' : 'Non Disibile'}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- TABELLA ORDINI --}}
    {{-- DATI DA VISUALIZZARE DATE_ORDER E SUBTOTAL --}}
    <div class="orders">
        <div class="card">
            <div class="card-header">
                <h3>Recent Orders</h3>

                <a href="" class="btn">See all <span class="las la-arrow-right"></span></a>
            </div>

            <div class="card-body">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Date <span class="las la-calendar"></span></td>
                            <td>Sub Total <span class="las la-dollar-sign"></span></td>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- CICLARE PER VISUALIZZARE I DATI DELLA TABELLA ORDINI --}}
                        <tr>
                            <td>12/05/2022 12:30</td>
                            <td>22.00 €</td>
                        </tr>
                        <tr>
                            <td>01/01/2022 11:45</td>
                            <td>52.00 €</td>
                        </tr>
                        <tr>
                            <td>02/04/2022 12:45</td>
                            <td>31.50 €</td>
                        </tr>
                        <tr>
                            <td>10/08/2022 20:30</td>
                            <td>45.00 €</td>
                        </tr>
                        <tr>
                            <td>11/02/2022 13:30</td>
                            <td>12.00 €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endif
@endsection