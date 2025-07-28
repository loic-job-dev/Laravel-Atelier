@extends('/components/layout-backoffice')

@section('content')
<h2 class="mb-4">Page de gestion des produits</h2>

<h3 class="mb-4">Liste des Parfums</h3>

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
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }} <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Editer</a></td>
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
            @endforeach
        </tbody>
    </table>
</div>
@endsection