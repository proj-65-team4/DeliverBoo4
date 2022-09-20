@extends('layouts.backend.app')

@section('content')
  <div class="container-fluid">
    <div class="d-flex align-items-center gap-3">
            <a href="{{ route("admin.products.index") }}"><i class="fa-solid fa-arrow-left"></i></a>
            <h1 mb-0>Inserisci nuovo piatto</h1>
        </div>
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
          name="price" value="{{ old('price') ?? $product->price }}" step=".01">
          <label for="floatingInput">Prezzo del Prodotto</label>
          <div class="invalid-feedback">
            {{ $errors->first('price') }}
          </div>
        </div>
        @dump($product->course)
        <div class="select-container d-flex gap-5">

          <div class="course-select flex-grow-1">
            <label for="coursesInput" class="form-label">Seleziona tipo di piatto</label>
            <select class="form-select mb-3" aria-label="Default select example" multiple name="course[]" id="coursesInput">
              @foreach ($productCourses as $course)
                <option value="{{$course->id}}">{{$course->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="category-select flex-grow-1">
            <label for="categoryInput" class="form-label">Seleziona tipo di piatto</label>
            <select class="form-select mb-3" aria-label="Default select example" multiple name="available[]" id="categoryInput">
              @foreach ($productCategories as $categories)
                <option value="{{$categories->name}}">{{$categories->name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-floating mb-3">
          <select name="product_course_id" class="form-select" id="">
            @foreach ($productCourses as $productCourse)
                <option value="{{$productCourse->id}}" {{ $product->product_course_id == $productCourse->id ? 'selected' : ''}}>{{$productCourse->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="check-input d-flex gap-5">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="visible" role="switch" id="ProductVisible" {{ $product->visible === 1 ? 'checked' : '' }} >
            <label class="form-check-label" for="ProductVisible">Prodotto Visibile</label>
          </div>
    
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="available" role="switch" id="ProductAvailable" {{ old("active") == 1 || $product["available"] == 1 ? 'checked' : '' }}>
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