@extends('components.layout')
@section('content')
  <h1 class = "text-center">Détail du produit #{{ $product->id }}</h1>
  <p><strong>Nom : </strong>{{ $product->name }}</p>
  <p><strong>Description : </strong>{{ $product->description }}</p>
  <p><strong>Prix small : </strong>{{ number_format($product->price_small/100,2,',',' ') }} €</p>
  <p><strong>Prix large : </strong>{{ number_format($product->price_large/100,2,',',' ') }} €</p>
  <!-- Bouton Modifier -->
  <a href="{{ route('backoffice.products.edit', $product->id) }}"
     class="btn btn-primary mb-3">
    Modifier ce produit
  </a>

  <!-- Retour à la liste des produits -->
  <a href="{{ route('backoffice.products.index') }}" class="btn btn-link">← Retour à la liste</a>

@endsection