@extends('/components/layout')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Votre panier</h1>

    @if (empty($cart) || count($cart) === 0)
    <div class="alert alert-info">
        Votre panier est vide.
    </div>
    @else
    <table class="table table-bordered table-striped align-middle table-custom">
        <thead>
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Quantité</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $productId => $quantity)
            @php $product = $products[$productId] ?? null; @endphp
            @if ($product)
            <tr>
                <td class="d-flex align-items-center">{{ $product->name }}</td>
                <td>{{ $quantity }}
                    <form action="{{ route('cart.delete', $productId) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger d-flex align-items-center m-3">Supprimer du panier</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>

    @endif
</div>
@endsection