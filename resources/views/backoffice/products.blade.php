@extends('components.layout')
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Liste des produits</h1>
    <a href="{{ route('backoffice.products.create') }}" 
       class="btn btn-sm btn-success">
      + Créer un produit
    </a>
  </div>
<h1 class = "text-center">Liste des produits</h1>
<table class="table table-striped">
    <thead>
        <tr><th>ID</th><th>Titre</th><th>Prix (€)</th><th>Quantité</th></tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price_small }}</td>
            <td>{{ $product->quantity_stock}}</td>
            <td>
                <a href="{{ route('backoffice.products.show', $product->id) }}" class="btn btn-info btn-sm">Détails</a>
            </td>
            <td>
                <form action="{{ route ('backoffice.products.destroy' , $product->id) }}" method="post"
                onsubmit="return confirm('Vraiment supprimer ce produit ?')">

            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
            Supprimer
            </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

