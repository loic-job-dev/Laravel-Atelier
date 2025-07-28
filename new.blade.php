@extends('components.backoffice-layout')
@section('content')
<h1>Ajouter un produit</h1>
<form method="POST" action="{{ route('backoffice.products.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Prix (€)</label>
        <input type="number" name="price" class="form-control" step="0.01" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
@endsection