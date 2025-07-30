@extends("/components/layout")
@section("content")

@auth('customer')
    <h2>Bienvenue, {{ auth('customer')->user()->first_name }} !</h2>

    <div class="container my-5">
    <h1 class="mb-4">Récapitulatif de votre commande</h1>

    @if (empty($cart) || count($cart) === 0)
        <div class="alert alert-info">
            Votre panier est vide.
        </div>
    @else
        <table class="table table-bordered table-striped align-middle table-custom">
            <thead class="text-center">
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
                        <td>{{ $product->name }}</td>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="ms-2">{{ $quantity }}</span>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
    
    <a href="{{ url('/cart/informations')}}" class="btn btn-custom px-4 py-2 m-3">Passer la commande</a>
</div>
@endauth

@endsection