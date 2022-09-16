@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>I tuoi prodotti</h1>
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">
                Aggiungi prodotto
            </a>

            @foreach ($products as $product)

            <div class="col-12">
                <img class="img-fluid" src="{{ $product->image }}" alt="">
                <div>Nome: {{ $product->name }}</div>
                <div>Prezzo: {{ $product->price }}</div>
                <div>Visibile: {{ $product->visible }}</div>
                <div>Disponibile: {{ $product->available }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection