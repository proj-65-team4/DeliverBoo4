@extends('layouts.backend.app')

@section('content')

    <div class="container-fluid">
        @if (session("message"))
        <div class="alert alert-success">{{ session("message")}}</div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.products.index') }}"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
                <h1 class="fw-bold m-0">Prodotti</h1>
            </div>

            <div class="">
                <form class="ms-3 d-flex" action="{{ route('admin.products.index') }}"
                    method="get">
                    {{-- @dd($query->product_course) --}}
                    <select name="product_course" id="product_course_id" class="form-select"
                        aria-label=".form-select example">
                        <option value="" selected>tutti</option>

                        @foreach ($courses as $course)
                            @if ($queryValue)
                                <option value="{{ $course->id }}" {{ $course->id == $queryValue ? 'selected' : '' }}>
                                    {{ $course->name }}</option>
                            @else
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endif
                        @endforeach

                    </select>
                    <button type="submit" class="ms-3 btn btn-light border-primary">Filtra</button>
                </form>
            </div>
        </div>

        @if (count($products))
            <div class="row flex-nowrap fw-bold text-center mt-4">
                <div class="col">Immagine</div>
                <div class="col-2">Nome</div>
                <div class="col">Prezzo</div>

                <div class="col d-none d-xl-block">Portata</div>
                <div class="col d-none d-lg-block">Categoria</div>

                <div class="col d-none d-md-block">Visibile</div>

                <div class="col d-none d-xl-block">Disponibile</div>

                <div class="col-2">Azioni</div>
            </div>

            @foreach ($products as $product)
                <div class="row flex-nowrap text-center mt-4 pt-2 align-items-center">

                    {{-- Immagine --}}
                    <div class="col">
                        <img class="w-100 shadow bg-body rounded food-image" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $product->id }}"
                        src="{{ $product->image ? $product->image : asset('img/food-placeholder.jpeg') }}" alt="">
                    </div>

                    {{-- Modal --}}
                    <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content position-relative">
                                <button type="button" class="btn-close position-absolute end-0 m-3" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                                <img class="" style="height: 300px"
                                    src="{{ $product->image ? $product->image : asset('img/food-placeholder.jpeg') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    {{-- Nome --}}
                    <div class="col-2">{{ $product->name }}</div>

                    {{-- Prezzo --}}
                    <div class="col">€ {{ $product->price }}</div>

                    {{-- Portata --}}
                    <div class="col d-none d-xl-block">
                        {{ $product->product_course_id ? $product->product_course->name : 'non inserita' }}</div>

                    {{-- Categoria --}}
                    <div class="col d-none d-lg-block">
                        {{ count($product->product_categories) !== 0 ? $product->product_categories->implode('name', ',') : 'non inserita' }}
                    </div>

                    {{-- Visible/Available --}}
                    <div class="col d-none d-md-block"><i
                            class="fa-solid {{ $product->visible === 1 ? 'fa-circle-check text-success' : 'fa-circle-xmark text-danger' }}"></i>
                    </div>
                    <div class="col d-none d-xl-block"><i
                            class="fa-solid {{ $product->available === 1 ? 'fa-circle-check text-success' : 'fa-circle-xmark text-danger' }}"></i>
                    </div>

                    {{-- Azioni --}}
                    <div class="col-2">
                        {{-- Button SHOW --}}
                        <div class="d-inline">
                            <a href="{{ route('admin.products.show', $product->id) }}" class="my-button show-btn m-1">
                                <i class="fa-solid fa-eye fa-lg"></i>
                            </a>
                        </div>

                        {{-- Button EDIT --}}
                        <div class="d-inline py-1">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="my-button edit-btn m-1">
                                <i class="fa-regular fa-pen-to-square fa-lg"></i>
                            </a>
                        </div>

                        {{-- Button DELETE --}}
                        <div class="d-inline py-1">
                            <button type="submit" class="my-button delete-btn m-1" data-bs-toggle="modal" data-bs-target="#ModalDelete{{$product->id}}">
                                <i class="fa-solid fa-trash-can fa-lg"></i>
                            </button>

                                {{-- delete modal --}}
                                <div class="modal fade" id="ModalDelete{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">{{ __('Elimina prodotto')}}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">Sicuro di voler eliminare <b>{{$product->name}}</b>?</div>
                                            <div class="modal-footer">
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                                    class="d-inline-block {{-- form-delete --}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDelete{{$product->id}}">
                                                        {{ __('Elimina')}}
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                                    {{ __('Annulla')}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            {{-- <crud-delete-btn action="{{ route('admin.products.destroy', $product->id)}}">
                                @csrf
                                @method('DELETE')
                            </crud-delete-btn> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h2 class="text-center">Nessun prodotto esistente</h2>
            <p class="text-center pt-3">
                <button class="btn btn-primary rounded-pill" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa-solid fa-plus text-light fa-lg"></i>
                </button>
            </p>
            <div class="collapse text-center" id="collapseExample">
                <a href="{{ route('admin.products.create') }}"
                    class="{{ Request::route()->getName() === 'admin.products.create' ? 'active' : '' }} btn btn-primary rounded-pill px-3">
                    <span class="text-light">Aggiungi prodotto</span>
                </a>
            </div>
        @endif

        <div class="pt-5 d-flex justify-content-center">
            <div>
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <style>
        .show-btn {
            background-color: #3DA5D9;
        }

        .edit-btn {
            background-color: #FFCA3A
        }

        .delete-btn {
            background-color: #FF595E
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

        @media only screen and (max-width: 540px){
            .my-button{
                width: 1.8rem;
                height: 1.8rem;;
                font-size: 0.7rem;
            }

            .my-button:after {
            content: '';
            }

            .my-button:hover {
            padding-right: 0;
            padding-left: 0;
        }
        }
    </style>
@endsection
