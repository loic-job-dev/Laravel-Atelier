@extends('/components/layout')
@section("content")

<h1 class="text-center my-5">Nouvelles Fragrances</h1>

<div class="container">
  <div class="row">
    <div class="col-md-12 mb-4">
      <img src="/pictures/exemple.jpg" alt="Parfum Douce Obsession" class="img-fluid mb-2">
      <h2>Douce Obsession. Eau de Parfum</h2>
      <p>Douce Obsession est une véritable invitation au voyage des sens, où se mêlent la tendresse des fleurs blanches et la chaleur enveloppante des accords gourmands...</p>
      <a href={{url ('/product/1') }} class="btn btn-primary">AJOUTER AU PANIER</a>
    </div>

    <div class="col-md-12 mb-4">
      <img src="/pictures/exemple.jpg" alt="Parfum Euphorie du Sud" class="img-fluid mb-2">
      <h2>Euphorie du Sud. Eau de Parfum</h2>
      <p>Euphorie du Sud est un parfum lumineux qui capture l’âme d’une côte méditerranéenne baignée de lumière dorée...</p>
      <a href={{url ('/product/2') }} class="btn btn-primary">AJOUTER AU PANIER</a>
    </div>
  </div>
</div>

    <h1 class ="text-center my-5">Nos Best Sellers</h1>
    <div class="container mt-5">
    <div class="row">
    <div class="col-md-6 mb-4">
      <img src="/pictures/exemple.jpg" alt="Parfum"  class="img-fluid">
      <h2>Rose Majesté. Eau de Parfum</h2>
      <a href={{url ('/product/3') }} class="btn btn-primary">AJOUTER AU PANIER</a>
    </div>

    <div class="col-md-6 mb-4">
      <img src="/pictures/exemple.jpg" alt="Parfum" class="img-fluid">
      <h2>Brise de Jasmin. Eau de Parfum</h2>
       <a href={{url ('/product/4') }} class="btn btn-primary">AJOUTER AU PANIER</a>
    </div>

    <div class="col-md-6 mb-4">
      <img src="/pictures/exemple.jpg" alt="Parfum" class="img-fluid">
      <h2>Lagune d'Iris. Eau de Parfum</h2>
       <a href={{url ('/product/5') }} class="btn btn-primary">AJOUTER AU PANIER</a>
    </div>

    <div class="col-md-6 mb-4">
      <img src="/pictures/exemple.jpg" alt="Parfum" class="img-fluid">
      <h2>Soleil d'Ete. Eau de parfum</h2>
       <a href={{url ('/product/6') }} class="btn btn-primary">AJOUTER AU PANIER</a>
    </div>
    

@endsection
