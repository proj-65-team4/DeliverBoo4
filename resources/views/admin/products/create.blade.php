@extends('layouts.backend.app')
@section('page_title', 'Inserisci nuovo prodotto')


@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('admin.products.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
            <h1 mb-0>Inserisci nuovo piatto</h1>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-container p-5">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="NameProduct"
                        placeholder="Nome Prodotto" value="{{ old("name") }}" name="name" >
                    <label for="NameProduct">Nome prodotto</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                </div>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="ImageProduct"
                            placeholder="Immagine Prodotto" value="{{ old("image") }}" name="image" >
                        <label for="ImageProduct">Immagine prodotto</label>
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    </div>


                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                        id="ProductDescription" placeholder="Descrizione Prodotto" name="description"
                        value="{{ old('description')}}">
                    <label for="ProductDescription">Descrizione Prodotto</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                        id="ProductPrice" placeholder="Prezzo del Prodotto" name="price"
                        value="{{ old('price') }}" step=".01">
                    <label for="floatingInput">Prezzo del Prodotto</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="product_course_id">Portata del piatto</label>
                    <select class="form-select" name="product_course_id" id="product_course_id" required>
                        <option value="">Seleziona piatto</option>
                        @foreach ($courses as $course)

                        <option value="{{ $course->id }}">{{-- {{ $course->id }} -  --}}{{ $course->name }}</option>
                            
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="categories">Categoria del piatto</label>
                    <select class="form-select" name="categories[]" id="categories" multiple >
                        <option value="">Seleziona categoria</option>
                        @foreach ($categories as $category)

                        <option value="{{ $category->id }}">{{-- {{ $category->id }} -  --}}{{ $category->name }}</option>
                            
                        @endforeach
                    </select>
                </div>

                <div class="check-input d-flex gap-5">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="visible" role="switch" id="ProductVisible"
                        {{ old('visible') == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="ProductVisible">Prodotto Visibile</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="available" role="switch"
                            id="ProductAvailable" {{ old('available') == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="ProductAvailable">Prodotto Disponibile</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success text-white"><i class="fa-solid fa-save"></i> Salva</button>
        </form>
    </div>
@endsection
