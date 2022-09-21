@extends('layouts.app')

@section("page_title",'Completa user')

@section('content')
    <div class="container">
        <h2>Completa i dati del tuo ristorante</h2>
        <form action="{{ route('admin.restaurant.store', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="mb-3">
                <label for="city">Inserisci città</label>
                <input type="text" name="city" value="" id="city" value="Napoli" placeholder="Napoli" disabled>
            </div>
            <div class="mb-3">
                <label for="address">Inserisci indirizzo</label>
                <input type="text" name="address" id="address" placeholder="Inserisci indirizzo">
            </div>
            <div class="mb-3">
                <label for="restaurant_name">Inserisci il nome del ristorante</label>
                <input type="text" name="restaurant_name" id="restaurant_name"
                    placeholder="Inserisci il nome del ristorante">
            </div>
            <div class="mb-3">
                <label for="VAT">Inserisci P. IVA</label>
                <input type="text" name="VAT" id="VAT" placeholder="Inserisci P. IVA">
            </div>
            <div class="mb-3">
                <label for="image">Inserisci immagine</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="mb-3">
                <label for="categories">Scegli categorie</label>
                <select class="form-select" name="categories[]" multiple aria-label="multiple select example">
                    <option selected></option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->id }} - {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 d-flex gap-3">
                <button type="submit" class="btn btn-success text-white">Completa</button>
                <a href="{{ route("admin.dashboard") }}" class="btn btn-secondary text-underline-none">Più tardi</a>
            </div>
        </form>
    </div>
@endsection
