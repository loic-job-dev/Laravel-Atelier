@extends("/components/layout")
@section("content")
    <div class="container mt-5">
        <h1 class="text-center mb-4">Catalogue de Produits</h1>
        
        <div class="row">
            <!-- Carte Produit 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/pictures/exemple.jpg" class="card-img-top" alt="Produit 1">
                    <div class="card-body">
                        <h5 class="card-title">Produit 1</h5>
                        <p class="card-text">Description courte du produit 1.</p>
                        <p><strong>Prix : 29,99€</strong></p>
                        <a href="{{ url('/product/1') }}" class="btn btn-primary">Ajouter au panier</a>
                    </div>
                </div>
            </div>
            
            <!-- Carte Produit 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/pictures/exemple.jpg" class="card-img-top" alt="Produit 2">
                    <div class="card-body">
                        <h5 class="card-title">Produit 2</h5>
                        <p class="card-text">Description courte du produit 2.</p>
                        <p><strong>Prix : 49,99€</strong></p>
                        <a href="{{ url('/product/2') }}" class="btn btn-primary">Ajouter au panier</a>
                    </div>
                </div>
            </div>
            
            <!-- Carte Produit 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/pictures/exemple.jpg" class="card-img-top" alt="Produit 3">
                    <div class="card-body">
                        <h5 class="card-title">Produit 3</h5>
                        <p class="card-text">Description courte du produit 3.</p>
                        <p><strong>Prix : 19,99€</strong></p>
                        <a href="{{ url('/product/3') }}" class="btn btn-primary">Ajouter au panier</a>
                    </div>
                </div>
            </div>

            <!-- Carte Produit 4 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/pictures/exemple.jpg" class="card-img-top" alt="Produit 4">
                    <div class="card-body">
                        <h5 class="card-title">Produit 4</h5>
                        <p class="card-text">Description courte du produit 4.</p>
                        <p><strong>Prix : 39,99€</strong></p>
                        <a href="{{ url('/product/4') }}" class="btn btn-primary">Ajouter au panier</a>
                    </div>
                </div>
            </div>

            <!-- Carte Produit 5 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/pictures/exemple.jpg" class="card-img-top" alt="Produit 5">
                    <div class="card-body">
                        <h5 class="card-title">Produit 5</h5>
                        <p class="card-text">Description courte du produit 5.</p>
                        <p><strong>Prix : 59,99€</strong></p>
                        <a href="{{ url('/product/5') }}" class="btn btn-primary">Ajouter au panier</a>
                    </div>
                </div>
            </div>

            <!-- Carte Produit 6 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/pictures/exemple.jpg" class="card-img-top" alt="Produit 6">
                    <div class="card-body">
                        <h5 class="card-title">Produit 6</h5>
                        <p class="card-text">Description courte du produit 6.</p>
                        <p><strong>Prix : 99,99€</strong></p>
                        <a href="{{ url('/product/6') }}" class="btn btn-primary">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS & Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyTK5d7D5r5cr6hF6pdkDp3g3iB9LsdNf6A2Ykc1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0py+gJ13yVxll9Q3zV0w+4D2js/0hQx5dG2iwpEapUmN/5K3" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0py+gJ13yVxll9Q3zV0w+4D2js/0hQx5dG2iwpEapUmN/5K3" crossorigin="anonymous"></script>
@endsection
