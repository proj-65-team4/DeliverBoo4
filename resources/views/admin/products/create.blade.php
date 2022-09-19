@extends('layouts.backend.app')
@section("page_title", "Inserisci nuovo prodotto")


@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route("admin.products.index") }}"><i class="fa-solid fa-arrow-left"></i></a>
            <h1 mb-0>Inserisci nuovo piatto</h1>
        </div>
        
        <form action="{{ route("admin.products.store") }}" method="POST">
            @csrf
            @method("POST")
            <div class="mb-3">
                <label for="name">Nome piatto:</label>
                <input class="form-control" type="text" name="name" id="name" >
            </div>
            <div class="mb-3">
                <label for="description">Descrizione</label>
                <input class="form-control" type="text" name="description" id="description" >
            </div>
            <div class="mb-3">
                <label for="price">Prezzo</label>
                <input class="form-control" type="number" name="price" id="price" >
            </div>
            <div class="mb-3">
                <label for="visible">Visibile?</label>
                <input class="form-check-input" type="checkbox" name="visible" id="visible" checked>
            </div>
            <div class="mb-3">
                <label for="available">Disponibile?</label>
                <input class="form-check-input" type="checkbox" name="available" id="available" checked>
            </div>
            <div class="mb-3">
                <label for="courses">Scegli categorie</label>
                <select class="form-select" name="courses" aria-label="default select example">
                    <option selected disabled>Scegli un opzione</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->id }} - {{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success text-white"><i class="fa-solid fa-save"></i> Salva</button>
        </form>
    </div>
@endsection
