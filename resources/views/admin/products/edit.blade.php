@extends('layouts.backend.app')

@section('content')
  <div class="container-fluid">
    <form action="{{route('admin.products.update', $product->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-container p-5">
        <div class="form-floating mb-3">
          <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="NameProduct" placeholder="Nome Prodotto" 
          name="name" value="{{ old('name') ?? $product->name }}">
          <label for="NameProduct">Nome prodotto</label>
          <div class="invalid-feedback">
            {{ $errors->first('name') }}
          </div>
        </div>
    
        <div class="form-floating mb-3">
          <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="ProductDescription" placeholder="Descrizione Prodotto" 
          name="description" value="{{ old('description') ?? $product->description }}">
          <label for="ProductDescription">Descrizione Prodotto</label>
          <div class="invalid-feedback">
            {{ $errors->first('description') }}
          </div>
        </div>
    
        <div class="form-floating mb-3">
          <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="ProductPrice" placeholder="Prezzo del Prodotto" 
          name="price" value="{{ old('price') ?? $product->price }}">
          <label for="floatingInput">Prezzo del Prodotto</label>
          <div class="invalid-feedback">
            {{ $errors->first('price') }}
          </div>
        </div>

        <div class="check-input d-flex gap-5">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" value="" role="switch" id="ProductVisible" {{ $product->visible === 1 ? 'checked' : '' }} >
            <label class="form-check-label" for="ProductVisible">Prodotto Visibile</label>
          </div>
    
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="available" role="switch" id="ProductAvailable" {{ $product->available === 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="ProductAvailable">Prodotto Disponibile</label>
          </div>
        </div>

        <div class="button-group py-3">
          <button type="submit" class="btn btn-success text-white me-3">Salva</button>
          <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Annulla</a>
        </div>

      </div>
    </form>
  </div>
@endsection