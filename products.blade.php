@extends("components.backoffice-layout")
@section('content')
<h1>Liste des produits</h1>
<table class="table table-striped">
    <thead>
        <tr><th>ID</th><th>Titre</th><th>Prix (€)</th><th>Actions</th></tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('backoffice.products.show', $product->id) }}" class="btn btn-info btn-sm">Détails</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection