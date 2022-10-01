@extends('layouts.backend.app')

@section('content')
    <div>
        <div class="fw-bold">Nr. Ordine: <span class="fw-normal">{{$orders->id}}</span></div>
        <div class="fw-bold">Nome: <span class="fw-normal">{{$orders->customer_name}}</span></div>
        <div class="fw-bold">Cognome: <span class="fw-normal">{{$orders->customer_surname}}</span></div>
        <div class="fw-bold">Tel.: <span class="fw-normal">{{$orders->customer_telephone}}</span></div>
        <div class="fw-bold">Email: <span class="fw-normal">{{$orders->customer_email}}</span></div>
        <div class="fw-bold">Indirizzo: <span class="fw-normal">{{$orders->delivery_address}}</span></div>
        <div class="fw-bold">Data ordine: <span class="fw-normal">{{date("d-m-Y h:m", strtotime($orders->date_order))}}</span></div>
        <div class="fw-bold">SubTotale: <span class="fw-normal">{{$orders->subtotal}}</span></div>
    </div>
@endsection