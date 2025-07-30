@extends('components.layout')
@section('content')
  <h1 class="text-center mb-4">Nouveau produit</h1>

  <form method="POST" action="{{ route('backoffice.products.store') }}">
    @csrf

    <div class="form-group mb-3">
      <label for="name">Nom</label>
      <input id="name"
             name="name"
             class="form-control"
             value="{{ old('name') }}"
             required>
    </div>

    <div class="form-group mb-3">
      <label for="description">Description</label>
      <textarea id="description"
                name="description"
                class="form-control"
                required>{{ old('description') }}</textarea>
    </div>

    <div class="row">
      <div class="col">
        <label for="price_small">Prix small (centimes)</label>
        <input id="price_small" type="number"
               name="price_small"
               class="form-control"
               value="{{ old('price_small') }}"
               required>
      </div>
      <div class="col">
        <label for="price_large">Prix large (centimes)</label>
        <input id="price_large" type="number"
               name="price_large"
               class="form-control"
               value="{{ old('price_large') }}"
               required>
      </div>
    </div>

    <div class="form-group mb-3">
      <label for="quantity_stock">Quantité en stock</label>
      <input id="quantity_stock" type="number"
             name="quantity_stock"
             class="form-control"
             value="{{ old('quantity_stock') }}"
             required>
    </div>

    {{-- Tous les autres champs sans $product --}}
    <div class="form-group mb-3">
      <label for="category_id">Catégorie (ID)</label>
      <input id="category_id" type="number"
             name="category_id"
             class="form-control"
             value="{{ old('category_id') }}"
             required>
    </div>

    <div class="form-group mb-3">
        <label for="head_notes">Notes de tête</label>
         <input id="head_notes" name="head_notes" class="form-control"
         value="{{ old('head_notes', $product->head_notes ?? '') }}">
    </div>

    <div class="form-group mb-3">
        <label for="heart_notes">Notes de cœur</label>
        <input id="heart_notes" name="heart_notes" class="form-control"
         value="{{ old('heart_notes', $product->heart_notes ?? '') }}">
    </div>

    <div class="form-group mb-3">
        <label for="deep_notes">Notes de fond</label>
        <input id="deep_notes" name="deep_notes" class="form-control"
         value="{{ old('deep_notes', $product->deep_notes ?? '') }}">
    </div>

    <div class="form-group mb-3">
        <label for="intensity">Intensité</label>
        <input id="intensity" name="intensity" class="form-control"
         value="{{ old('intensity', $product->intensity ?? '') }}">
    </div>

    <div class="form-group mb-3">
        <label for="track">Sillage</label>
        <input id="track" name="track" class="form-control"
         value="{{ old('track', $product->track ?? '') }}">
    </div>

    <div class="form-group mb-3">
        <label for="history">Histoire</label>
        <textarea id="history" name="history" class="form-control">{{ old('history', $product->history ?? '') }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="ingredients">Ingrédients</label>
        <textarea id="ingredients" name="ingredients" class="form-control">{{ old('ingredients', $product->ingredients ?? '') }}</textarea>
    </div>

    <div class="mt-4">
      <button type="submit" class="btn btn-success">Créer</button>
      <a href="{{ route('backoffice.products.index') }}" class="btn btn-link">Annuler</a>
    </div>
  </form>
@endsection
