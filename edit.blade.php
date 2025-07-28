@extends('components.backoffice-layout')
@section('content')
<h1>Modifier le produit</h1>
<form method="POST" action="{{ route('backoffice.products.update', $product->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="title" value="{{ $product->title }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Prix (€)</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control" step="0.01" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection
