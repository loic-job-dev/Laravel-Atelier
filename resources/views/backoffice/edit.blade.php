@extends('components.layout')
@section('content')
  <h1 class=" text-center mb-4">Modifier le produit #{{ $product->id }}</h1>

  <form method="POST" action="{{ route('backoffice.products.update', $product->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
      <label for="name">Nom</label>
      <input id="name" name="name" class="form-control"
             value="{{ old('name', $product->name) }}">
    </div>

    <div class="form-group mb-3">
      <label for="description">Description</label>
      <textarea id="description" name="description"
                class="form-control">{{ old('description', $product->description) }}</textarea>
    </div>

    <div class="row">
      <div class="col">
        <label for="price_small">Prix small (centimes)</label>
        <input id="price_small" type="number" name="price_small" class="form-control"
               value="{{ old('price_small', $product->price_small) }}">
      </div>
      <div class="col">
        <label for="price_large">Prix large (centimes)</label>
        <input id="price_large" type="number" name="price_large" class="form-control"
               value="{{ old('price_large', $product->price_large) }}">
      </div>
    </div>
    <div class="form-group mb-3">
      <label for="quantity_stock">Quantité</label>
      <input id="quantity_stock" name="quantity_stock" class="form-control"
             value="{{ old('name', $product->quantity_stock) }}">
    </div>    

    <div class="mt-4">
      <button type="submit" class="btn btn-primary">Enregistrer</button>
      <a href="{{ route('backoffice.products.show', $product->id) }}"
         class="btn btn-link">Annuler</a>
    </div>
  </form>
@endsection
