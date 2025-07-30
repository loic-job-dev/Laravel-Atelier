@extends('components.layout')
@section('content')
  <h1 class = "text-center">Détail du produit #{{ $product->id }}</h1>
  <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix Large</th>
                    <th>Prix Small</th>
                    <th>Catégorie</th>
                    <th style="width: 200px">Description</th>
                    <th>Notes de Tête</th>
                    <th>Notes de Cœur</th>
                    <th>Notes de Fond</th>
                    <th>Intensité</th>
                    <th>Sillage</th>
                    <th style="width: 200px">Histoire</th>
                    <th style="width: 200px">Ingrédients</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><div class="col"><div class="text-center">{{ $product->id }}</div>  
                        </div>
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price_large }}</td>
                    <td>{{ $product->price_small }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td class="text-wrap">{{ $product->description }}</td>
                    <td>{{ $product->head_notes }}</td>
                    <td>{{ $product->heart_notes }}</td>
                    <td>{{ $product->deep_notes }}</td>
                    <td>{{ $product->intensity }}</td>
                    <td>{{ $product->track }}</td>
                    <td class="text-wrap">{{ $product->history }}</td>
                    <td class="text-wrap">{{ $product->ingredients }}</td>
                </tr>
            </tbody>
        </table>
    </div>
  <!-- Bouton Modifier -->
  <a href="{{ route('backoffice.products.edit', $product->id) }}"
     class="btn btn-primary mb-3">
    Modifier ce produit
  </a>

  <!-- Retour à la liste des produits -->
  <a href="{{ route('backoffice.products.index') }}" class="btn btn-link">← Retour à la liste</a>

@endsection