@extends('/components/layout-backoffice')

@section('content')
    <h2 class="mb-4">Modifier un Parfum</h2>

    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>

            <div class="col-md-3">
                <label for="price_large" class="form-label">Prix Large</label>
                <input type="number" step="0.01" class="form-control" id="price_large" name="price_large" value="{{ $product->price_large }}" required>
            </div>

            <div class="col-md-3">
                <label for="price_small" class="form-label">Prix Small</label>
                <input type="number" step="0.01" class="form-control" id="price_small" name="price_small" value="{{ $product->price_small }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="quantity_stock" class="form-label">Quantité en stock</label>
            <input type="number" class="form-control" id="quantity_stock" name="quantity_stock" value="{{ $product->quantity_stock }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="category_id" name="category_id" value="{{ $product->category_id }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="head_notes" class="form-label">Notes de Tête</label>
                <input type="text" class="form-control" id="head_notes" name="head_notes" value="{{ $product->head_notes }}">
            </div>
            <div class="col-md-4">
                <label for="heart_notes" class="form-label">Notes de Cœur</label>
                <input type="text" class="form-control" id="heart_notes" name="heart_notes" value="{{ $product->heart_notes }}">
            </div>
            <div class="col-md-4">
                <label for="deep_notes" class="form-label">Notes de Fond</label>
                <input type="text" class="form-control" id="deep_notes" name="deep_notes" value="{{ $product->deep_notes }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="intensity" class="form-label">Intensité</label>
                <input type="text" class="form-control" id="intensity" name="intensity" value="{{ $product->intensity }}">
            </div>
            <div class="col-md-6">
                <label for="track" class="form-label">Sillage</label>
                <input type="text" class="form-control" id="track" name="track" value="{{ $product->track }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="history" class="form-label">Histoire</label>
            <textarea class="form-control" id="history" name="history" rows="3">{{ $product->history }}</textarea>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingrédients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="2">{{ $product->ingredients }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        <a href="" class="btn btn-secondary ms-2">Annuler</a>
    </form>
@endsection
