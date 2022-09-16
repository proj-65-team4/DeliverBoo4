@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>I tuoi prodotti</h1>
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">
                Aggiungi prodotto
            </a>
            
            <table>
                <thead>
                    <tr>
                        <th>Immagine</th>
                        <th>Nome</th>
                        <th>Prezzo</th>
                        <th>Visibile</th>
                        <th>Disponibile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)

                    <tr>
                        <td><img class="img-fluid" src="{{ $product->image }}" alt=""></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->visible }}</td>
                        <td>{{ $product->available }}</td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection