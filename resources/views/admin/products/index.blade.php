@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <h1 class="pb-4 pt-1">Prodotti inseriti</h1>
        {{-- @php
            dd($products);
        @endphp --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Immagine</th>
                    <th>Nome prodotto</th>
                    <th>Prezzo</th>
                    <th>Portata</th>
                    <th>Visibile</th>
                    <th>Disponibile</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        {{-- <td><img class="img-thumbnail" style="height: 80px"
                                src="{{ $product->image ? $product->image : asset('img/food-placeholder.jpeg') }}"
                                alt=""></td> --}}

                        <td class="text-center"><button type="button" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$product->id}}">
                                <img class="" style="height: 80px"
                                    src="{{ $product->image ? $product->image : asset('img/food-placeholder.jpeg') }}"
                                    alt="">
                            </button></td>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
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
                        {{-- @php
                            dd($product);
                        @endphp --}}
                        
                        <td>{{ $product->name }}</td>
                        <td>€ {{ $product->price }}</td>

                        <td>{{ $product->product_course_id ? $product->product_course->name : 'non inserita' }}</td>

                        <td><i class="fa-solid {{ $product->visible === 1 ? 'fa-circle-check' : 'fa-ban' }}"></i></td>
                        <td><i class="fa-solid {{ $product->available === 1 ? 'fa-circle-check' : 'fa-ban' }}"></i></td>

                        {{-- Button SHOW --}}
                        <td>
                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-eye fa-lg"></i>
                            </a>
                        </td>

                        {{-- Button EDIT --}}
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info">
                                <i class="fa-regular fa-pen-to-square fa-lg"></i>
                            </a>
                        </td>

                        {{-- Button DELETE --}}
                        <td>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can fa-lg"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
