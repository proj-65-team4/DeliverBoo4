@extends('layouts.backend.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="cards">

    <div class="card-single">
        <div>
            {{-- INSERIRE NUMERO TOTALE PRODOTTI --}}
            <h1>54</h1>
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
                            <tr>
                                <td>Prodotto 1</td>
                                <td><span class="status status-false"></span>not available</td>
                                <td><span class="status status-false"></span>not visible</td>
                            </tr>
                            <tr>
                                <td>Prodotto 2</td>
                                <td><span class="status status-true"></span>available</td>
                                <td><span class="status status-true"></span>visible</td>
                            </tr>
                            <tr>
                                <td>Prodotto 3</td>
                                <td><span class="status status-false"></span>not available</td>
                                <td><span class="status status-false"></span>not visible</td>
                            </tr>
                            <tr>
                                <td>Prodotto 4</td>
                                <td><span class="status status-false"></span>not available</td>
                                <td><span class="status status-false"></span>not visible</td>
                            </tr>
                            <tr>
                                <td>Prodotto 5</td>
                                <td><span class="status status-true"></span>available</td>
                                <td><span class="status status-true"></span>visible</td>
                            </tr>
                            <tr>
                                <td>Prodotto 6</td>
                                <td><span class="status status-true"></span>available</td>
                                <td><span class="status status-false"></span>not visible</td>
                            </tr>
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
@endsection