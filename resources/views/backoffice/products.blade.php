@extends('components.layout')
@section('content')
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
                <form action="" method="post"></form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

