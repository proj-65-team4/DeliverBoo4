@extends('layouts.backend.app')
@section('page_title', 'Modifica il prodotto')

@section('content')
  <div class="container-fluid">
    <div class="d-flex align-items-center gap-3">
            <a href="{{ route("admin.products.index") }}"><i class="fa-solid fa-arrow-left"></i></a>
            <h1 mb-0>Modifica il Piatto</h1>
        </div>
    <form action="{{route('admin.products.update', $product->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-container p-5">
        <div class="form-floating mb-3">
          <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required
            id="NameProduct" placeholder="Nome Prodotto" 
          name="name" value="{{ old('name') ?? $product->name }}">
          <label for="NameProduct">Nome prodotto*</label>
          @error('name')
            <div class="invalid-feedback alert alert-danger p-2"> 
              {{$message}} 
            </div>
          @enderror
        </div>


        <div class="form-floating mb-3">
          <input type="text" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" 
            id="ImageProduct" placeholder="Immagine Prodotto" 
          name="image" value="{{ old('image') ?? $product->image }}">
          <label for="ImageProduct">Immagine prodotto</label>
          <div class="invalid-feedback">
            {{ $errors->first('image') }}
          </div>
        </div>

    
        <div class="form-floating mb-3">
          <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" required
            id="ProductDescription" placeholder="Descrizione Prodotto" 
          name="description" value="{{ old('description') ?? $product->description }}">
          <label for="ProductDescription">Descrizione Prodotto*</label>
          @error('description')
            <div class="invalid-feedback alert alert-danger p-2"> 
              {{$message}} 
            </div>
          @enderror
        </div>
    
        <div class="form-floating mb-3">
          <input type="number" min="0" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" required
            id="ProductPrice" placeholder="Prezzo del Prodotto" 
          name="price" value="{{ old('price') ?? $product->price }}" step=".01">
          <label for="floatingInput">Prezzo del Prodotto*</label>
          @error('price')
            <div class="invalid-feedback alert alert-danger p-2">
              {{$message}} 
            </div>
          @enderror
        </div>


        <div class="select-container row mb-3">
          <div class="col-6 category-select flex-grow-1">
            <label for="categoryInput" class="form-label">Categoria del piatto</label>
            <select class="form-select"  aria-label="Default select example" multiple name="categories[]" 
              id="categoryInput">
              @foreach ($productCategories as $category)
                <option value="{{$category->id}}" 
                  {{ $product->product_categories->contains("id", $category->id)   ? 'selected' : ''}}>{{$category->name}}
                </option>
              @endforeach
            </select>
          </div>

          <div class="col-6 course-select flex-grow-1 align-items-stretch">
            <label for="coursesInput" class="form-label">Portata del piatto*</label>
              <select name="product_course_id" class="form-select" id="" required>
                @foreach ($productCourses as $productCourse)
                    <option value="{{$productCourse->id}}" 
                      {{ $product->product_course_id == $productCourse->id ? 'selected' : ''}}>{{$productCourse->name}}
                    </option>
                @endforeach
              </select>
          </div>

        </div>

        <div class="check-input d-flex gap-5">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="visible" role="switch" 
              id="ProductVisible" {{ $product->visible === 1 ? 'checked' : '' }} >
            <label class="form-check-label" for="ProductVisible">Prodotto Visibile</label>
          </div>
    
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="available" role="switch" 
              id="ProductAvailable" {{ old("active") == 1 || $product["available"] == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="ProductAvailable">Prodotto Disponibile</label>
          </div>
        </div>

        <div class="text-secondary my-2"> * I campi sono obbligatori</div>

        <div class="button-group py-2">
          <button type="submit" class="btn btn-success text-white me-3">Salva</button>
          <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Annulla</a>
        </div>

      </div>
    </form>
  </div>
@endsection