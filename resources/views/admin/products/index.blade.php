@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <h1 class="pb-4 pt-1">Prodotti inseriti</h1>
        <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-sm-12 py-4">

                    {{-- TITLE --}}
                    <h3 class="py-3 fw-bold">{{ $product->name }}</h3>

                    {{-- Image --}}
                    <div class="backend-img m-auto">
                        <img class="index-img" src="{{ $product->image }}" alt="">
                    </div>

                    {{-- Info base --}}
                    <div>
                        <div>Prezzo: € {{ $product->price }}</div>
                        <div>Portata: {{ $product->product_course_id ? $product->product_course_id->name : 'non inserita' }}
                        </div>
                        <div>Categoria:
                            {{ $product->product_course_id ? $product->product_course_id->name : 'non inserita' }}</div>
                        <div>Visibile: {{ $product->visible === 1 ? 'SI' : 'NO' }}</div>
                        <div>Disponibile: {{ $product->available === 1 ? 'SI' : 'NO' }}</div>

                        {{-- Button SHOW --}}

                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-warning">
                            <svg class="bi" width="16" height="16">
                                <use xlink:href="/bootstrap-icons.svg#eye-fill"></use>
                            </svg>
                        </a>

                        {{-- Button EDIT --}}

                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info">
                            <svg class="bi" width="16" height="16">
                              <use xlink:href="/bootstrap-icons.svg#pencil-square"></use>
                            </svg>
                          </a>


                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
