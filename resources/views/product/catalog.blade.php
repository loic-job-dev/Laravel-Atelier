@extends("/components/layout")

@section("content")
<div class="container mt-5">
    <h1 class="text-center mb-4">Catalogue de Produits</h1>

    <div class="row">

        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/pictures/exemple.jpg" class="card-img-top" alt="{{ $product -> name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product -> name }}</h5>
                    <p class="card-text">{{ $product -> description }}</p>
                    <p><strong>Prix : {{ number_format($product -> price_large / 100, 2, ',', ' ')}} €</strong></p>
                    <a href="/product/{{ $product -> id }}" class="btn btn-primary">Voir le produit</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>


<!-- Bootstrap JS & Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyTK5d7D5r5cr6hF6pdkDp3g3iB9LsdNf6A2Ykc1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0py+gJ13yVxll9Q3zV0w+4D2js/0hQx5dG2iwpEapUmN/5K3" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0py+gJ13yVxll9Q3zV0w+4D2js/0hQx5dG2iwpEapUmN/5K3" crossorigin="anonymous"></script>
@endsection
