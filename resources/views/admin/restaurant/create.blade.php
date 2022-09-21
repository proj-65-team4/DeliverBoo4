@extends('layouts.app')

@section('page_title', 'Registra ristorante')

@section('content')
    <div class="container">
        <h2>Completa i dati del tuo ristorante</h2>
        <form action="{{ route('admin.restaurant.store', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3 form-floating">
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city"
                    value="" id="city" value="Napoli" placeholder="Napoli" disabled>
                <label for="city">Napoli</label>
                @error('city')
                    <div class="invalid-feedback alert alert-danger p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 form-floating">
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address"
                    id="address" placeholder="Inserisci indirizzo">
                <label for="address">Inserisci indirizzo</label>
                @error('address')
                    <div class="invalid-feedback alert alert-danger p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 form-floating">
                <input class="form-control {{ $errors->has('restaurant_name') ? 'is-invalid' : '' }}" type="text" name="restaurant_name"
                    id="restaurant_name" placeholder="Inserisci il nome del ristorante">
                <label for="restaurant_name">Inserisci il nome del ristorante</label>
                @error('restaurant_name')
                    <div class="invalid-feedback alert alert-danger p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 form-floating">
                <input class="form-control {{ $errors->has('VAT') ? 'is-invalid' : '' }}" type="text" name="VAT"
                    id="VAT" placeholder="Inserisci P. IVA">
                <label for="VAT">Inserisci P. IVA</label>
                @error('VAT')
                    <div class="invalid-feedback alert alert-danger p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image">Inserisci immagine</label>
                <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" name="image"
                    id="image">
                @error('image')
                    <div class="invalid-feedback alert alert-danger p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categories">Scegli categorie</label>
                <select class="form-select" name="categories[]" multiple aria-label="multiple select example">
                    <option selected></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" >{{ $category->id }} - {{ $category->name }}</option>
                    @endforeach
                </select>
                
                @error('name')
                    <div class="invalid-feedback alert alert-danger p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 d-flex gap-3">
                <button type="submit" class="btn btn-success text-white">Completa</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary text-underline-none">Più tardi</a>
            </div>
        </form>
    </div>
@endsection
