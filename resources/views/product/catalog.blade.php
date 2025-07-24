@extends("/components/layout")

@section("content")
<div class="container mt-5">
    <h1 class="text-center mb-4">Catalogue de Produits</h1>
    @if(count($products) > 0)
    <div class="row">
        @foreach($products as $product)

        <!-- Carte Produit 6 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/pictures/exemple.jpg" class="card-img-top" alt="Produit 6">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p><strong>{{ number_format($product->price, 2) }}€</strong></p>
                    <a href="{{ url('/product/6') }}" class="btn btn-primary">Ajouter au panier</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>Aucun produit trouvé.</p>
    @endif
</div>

<!-- Bootstrap JS & Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyTK5d7D5r5cr6hF6pdkDp3g3iB9LsdNf6A2Ykc1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0py+gJ13yVxll9Q3zV0w+4D2js/0hQx5dG2iwpEapUmN/5K3" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0py+gJ13yVxll9Q3zV0w+4D2js/0hQx5dG2iwpEapUmN/5K3" crossorigin="anonymous"></script>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> bce11a4 ( connection db + statement done)
