@extends("/components/layout")
@section("content")

@auth('user')
    <h2>Bienvenue, {{ auth('user')->user()->first_name }} !</h2>

    <div class="container my-5">
    <h1 class="mb-4">Récapitulatif de votre commande</h1>

    @if (empty($cart) || count($cart) === 0)
        <div class="alert alert-info">
            Votre panier est vide.
        </div>
    @else
    <h3>Vos produits</h3>
                <table class="table table-bordered table-striped align-middle table-custom">
            <thead class="table-light text-center">
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Sous-total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                    $shipping_cost = 15.90;
                @endphp
                @foreach ($cart as $productId => $quantity)
                    @php
                        $product = $products[$productId];
                        $unit_price = $product->price_large / 100;
                        $subtotal = $unit_price * $quantity;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td class="text-center">{{ $quantity }}</td>
                        <td>{{ number_format($unit_price, 2, ',', ' ') }} €</td>
                        <td>{{ number_format($subtotal, 2, ',', ' ') }} €</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end"><strong>Frais de port</strong></td>
                    <td>{{ number_format($shipping_cost, 2, ',', ' ') }} €</td>
                    @php $total += $shipping_cost; @endphp
                </tr>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total à payer</strong></td>
                    <td><strong>{{ number_format($total, 2, ',', ' ') }} €</strong></td>
                </tr>
            </tbody>
        </table>
    @endif
<h3 class="mb-3">Vos informations personnelles</h3>

<div class="card shadow-sm border-0 mb-4" style="background-color: #fffdf4;">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Nom :</strong> {{ auth('user')->user()->last_name }}</p>
                <p><strong>Prénom :</strong> {{ auth('user')->user()->first_name }}</p>
                <p><strong>Email :</strong> {{ auth('user')->user()->email }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Adresse :</strong> {{ auth('user')->user()->adress->address }}</p>
                <p><strong>Code postal :</strong> {{ auth('user')->user()->adress->zip_code }}</p>
                <p><strong>Ville :</strong> {{ auth('user')->user()->adress->city }}</p>
            </div>
        </div>
    </div>
</div>
    <a href="{{ url('/cart/payment')}}" class="btn btn-custom px-4 py-2 m-3">Payer</a>
</div>
@endauth

@endsection