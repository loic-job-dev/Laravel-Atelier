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
    <h3>Vos produits</h3>
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
<h3 class="mb-3">Vos informations personnelles</h3>

<div class="card shadow-sm border-0 mb-4" style="background-color: #fffdf4;">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Nom :</strong> {{ auth('customer')->user()->last_name }}</p>
                <p><strong>Prénom :</strong> {{ auth('customer')->user()->first_name }}</p>
                <p><strong>Email :</strong> {{ auth('customer')->user()->email }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Adresse :</strong> {{ auth('customer')->user()->adress->address }}</p>
                <p><strong>Code postal :</strong> {{ auth('customer')->user()->adress->zip_code }}</p>
                <p><strong>Ville :</strong> {{ auth('customer')->user()->adress->city }}</p>
            </div>
        </div>
    </div>
</div>
    <a href="{{ url('/cart/informations')}}" class="btn btn-custom px-4 py-2 m-3">Payer</a>
</div>
@endauth

@endsection