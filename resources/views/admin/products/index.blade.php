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
                        <img class="index-img" src="{{ $product->image ? $product->image : asset("img/food-placeholder.jpeg") }}" alt="">
                    </div>

                    {{-- Info base --}}
                    <div>
                        <div>Prezzo: € {{ $product->price }}</div>
                        <div>Portata: {{ $product->product_course_id ? $product->product_course_id->name : 'non inserita' }}
                        </div>
                        <div>Categoria:
                            {{ $product->product_course_id ? $product->product_course_id->name : 'non inserita' }}</div>
                        <div>Visibile: <i class="fa-solid {{ $product->visible === 1 ? 'fa-circle-check' : 'fa-ban' }}"></i></div>
                        <div>Disponibile: <i class="fa-solid {{ $product->available === 1 ? 'fa-circle-check' : 'fa-ban' }}"></i></div>

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


                        {{-- Buttone DELETE  --}}

                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
