@extends('layouts.backend.app')

@section('content')

<style lang="scss">
    .show-btn {
        background-color: #3DA5D9
    }
    .edit-btn {
        background-color: #FFCA3A
    }
    .delete-btn {
        background-color: #FF595E
    }
</style>
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center gap-3  mb-4">
                <a href="{{ route("admin.products.index") }}"><i class="fa-solid fa-arrow-left"></i></a>
                <h1 class="mt-1 fw-bold">Prodotti Menu</h1>
            </div>

            <div class="pe-4">
                <form style="padding-top: 0.5rem;" class="ms-3 d-flex" action="{{ route('admin.products.index') }}"
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

                    <div class="col-3">Azioni</div>
                </div>

                    @foreach ($products as $product)
                        <div class="row flex-nowrap text-center mt-4 pt-2">

                            {{-- Immagine --}}
                            <div class="col">
                                <button type="button" class="img-thumbnail" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $product->id }}">
                                    <img class="w-100"
                                        src="{{ $product->image ? $product->image : asset('img/food-placeholder.jpeg') }}"
                                        alt="">
                                </button>
                            </div>

                            {{-- Modal --}}
                            <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="" style="height: 300px"
                                                src="{{ $product->image ? $product->image : asset('img/food-placeholder.jpeg') }}"
                                                alt="">
                                        </div>
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
                                {{ $product->product_categories ? $product->product_categories->implode('name', ',') : 'non esiste' }}
                            </div>

                            {{-- Visible/Available --}}
                            <div class="col d-none d-md-block"><i
                                    class="fa-solid {{ $product->visible === 1 ? 'fa-circle-check text-success' : 'fa-circle-xmark text-danger' }}"></i>
                            </div>
                            <div class="col d-none d-xl-block"><i
                                    class="fa-solid {{ $product->available === 1 ? 'fa-circle-check text-success' : 'fa-circle-xmark text-danger' }}"></i>
                            </div>

                            {{-- Azioni --}}
                            <div class="col-3">
                                    {{-- Button SHOW --}}
                                    <div class="d-inline">
                                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn show-btn mb-2">
                                            <i class="fa-solid fa-eye fa-lg"></i>
                                        </a>
                                    </div>

                                    {{-- Button EDIT --}}
                                    <div class="d-inline py-1">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn edit-btn mb-2">
                                            <i class="fa-regular fa-pen-to-square fa-lg"></i>
                                        </a>
                                    </div>

                                    {{-- Button DELETE --}}
                                    <div class="d-inline py-1">
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn delete-btn mb-2"><i
                                                    class="fa-solid fa-trash-can fa-lg"></i></button>
                                        </form>
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
    </div>
@endsection
