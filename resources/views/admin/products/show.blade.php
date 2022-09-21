@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
    <div class="d-flex align-items-center gap-3">
      <a href="{{ route("admin.products.index") }}"><i class="fa-solid fa-arrow-left"></i></a>
      <h1 class="fw-bold mt-2">{{ $product->name }}</h1>
    </div>

        <div class="row justify-content-center">
                <div class="col-sm-12 col-lg m-lg-auto py-4">
                    {{-- Image --}}
                    <div class="backend-img mb-5">
                        <img class="index-img" src="{{ $product->image ? $product->image : asset('img/food-placeholder.jpeg') }}" alt="">
                    </div>

                    {{-- Info base --}}
                    <div class="d-flex flex-column gap-1">
                        <div class="fw-bold">Descrizione: <span class="fw-normal">{{ $product->description }} </span></div>
                        <div class="fw-bold">Prezzo: <span class="fw-normal">€ {{ $product->price }} </span></div>
                        <div class="fw-bold">Portata: <span class="fw-normal">{{ $product->product_course_id ? $product->product_course->name : 'non inserita' }} </span></div>
                        <div class="fw-bold">Categoria: <span class="fw-normal">{{ $product->product_categories ? $product->product_categories->implode("name",", ") : "non inserita" }} </span></div>
                        <div class="fw-bold">Visibile: <span class="fw-normal">{{ $product->visible === 1 ? 'SI' : 'NO' }} </span></div>
                        <div class="fw-bold">Disponibile: <span class="fw-normal">{{ $product->available === 1 ? 'SI' : 'NO' }} </span></div>
                    </div>

                      {{-- Button EDIT --}}

                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info">
                      <svg class="bi" width="16" height="16">
                        <use xlink:href="/bootstrap-icons.svg#pencil-square"></use>
                      </svg>
                    </a>
                </div>
        </div>
    </div>
@endsection
