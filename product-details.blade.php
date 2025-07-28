@extends('components.backoffice-layout')
@section('content')
<h1>Détails du produit</h1>
<ul class="list-group mb-3">
    <li class="list-group-item"><strong>ID :</strong> {{ $product->id }}</li>
    <li class="list-group-item"><strong>Titre :</strong> {{ $product->title }}</li>
    <li class="list-group-item"><strong>Prix :</strong> {{ $product->price }} €</li>
    <li class="list-group-item"><strong>Description :</strong> {{ $product->description }}</li>
</ul>
<a href="{{ route('backoffice.products.edit', $product->id) }}" class="btn btn-warning">Modifier</a>
<form action="{{ route('backoffice.products.destroy', $product->id) }}" method="POST" class="d-inline">
    @csrf @method('DELETE')
    <button class="btn btn-danger" onclick="return confirm('Confirmer suppression ?')">Supprimer</button>
</form>
@endsection