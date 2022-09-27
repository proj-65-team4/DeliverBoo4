@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        
        @if (session("message"))
            <div class="alert alert-success">{{ session("message")}}</div>
        @endif

    <div class="d-flex align-items-center gap-3">
      <a href="{{ route("admin.products.index") }}"><i class="fa-solid fa-arrow-left"></i></a>
      <h1 class="fw-bold mt-2">{{ $product->name }}</h1>
    </div>

        <div class="row justify-content-center">
                <div class="col-sm-12 col-lg m-lg-auto py-4">
                    {{-- Image --}}
                    <div class="backend-img mb-5 m-auto">
                        <img class="index-img" src="{{ $product->image ? $product->image : asset('img/food-placeholder.jpeg') }}" alt="">
                    </div>

                    {{-- Info base --}}
                    <div class="d-flex flex-column gap-1 mb-3">
                        <div class="fw-bold">Descrizione: <span class="fw-normal">{{ $product->description }} </span></div>
                        <div class="fw-bold">Prezzo: <span class="fw-normal">€ {{ $product->price }} </span></div>
                        <div class="fw-bold">Portata: <span class="fw-normal">{{ $product->product_course_id ? $product->product_course->name : 'non inserita' }} </span></div>
                        <div class="fw-bold">Categoria: <span class="fw-normal">{{ count($product->product_categories) !== 0 ? $product->product_categories->implode('name', ',') : 'non inserita' }}</span></div>
                        <div class="fw-bold">Visibile: <i class="fa-solid {{ $product->available === 1 ? 'fa-circle-check text-success' : 'fa-circle-xmark text-danger' }}"></i></div>
                        <div class="fw-bold">Disponibile: <i class="fa-solid {{ $product->available === 1 ? 'fa-circle-check text-success' : 'fa-circle-xmark text-danger' }}"></i></div>
                    </div>

                      {{-- Button EDIT --}}
                      
                    <div class="d-inline py-1">
                      <a href="{{ route('admin.products.edit', $product->id) }}" class="my-button edit-btn m-1">
                          <i class="fa-regular fa-pen-to-square fa-lg"></i>
                      </a>
                  </div>
                </div>
        </div>
    </div>

    <style>
        .edit-btn {
            background-color: #FFCA3A
        }

        .my-button {
            border-radius: 4px;
            border: none;
            color: #fff;
            text-align: center;
            font-size: 1rem;
            padding: 8px;
            width: 2.5rem;
            transition: all 0.5s;
            cursor: pointer;
            box-shadow: 0 10px 20px -8px rgba(0, 0, 0, .7);
            display: inline-block;
            position: relative;
        }
        .my-button:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 22px;
            right: -20px;
            transition: 0.5s;
        }

        .my-button:hover {
            padding-right: 24px;
            padding-left: 8px;
            color: white
        }

        .my-button:hover:after {
            opacity: 1;
            right: 10px;
        }

        .food-image {
            cursor: pointer;
        }
    </style>
@endsection
