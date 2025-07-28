@extends("/components/layout")
@section("content")
<h1>Fiche du produit {{ $id }}</h1>

<h3>Boutique / {{ $product -> category -> name }} / {{ $product -> name }}</h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-7 ml-5">
            <img src="/pictures/exemple.jpg" class="img-fluid" alt="picture exemple" />
        </div>
        <div class="col-3">
            <img src="/pictures/exemple.jpg" class="img-fluid mb-5" alt="picture exemple" />
            <img src="/pictures/exemple.jpg" class="img-fluid" alt="picture exemple" />
        </div>
    </div>
</div>
        <h1 class="d-inline">{{ $product -> name }} - </h1>
        <h2 class="d-inline"><em>{{ $product -> category -> name }}</em></h2>
<h2>{{ $price }} €</h3>

<h3>SIZE</h2>
<div>
    <button>Small (50cL)</button>
    <button>Large (100cL)</button>
</div>

<button>AJOUTER AU PANIER</button>

<p>{{ $product -> description }}</p>

<hr>

<h2>Notes olfactives</h2>
<div>
    <h3>Notes de tête</h3>
    <h3>{{ $product -> head_notes }}</h3>
</div>
<div>
    <h3>Notes de coeur</h3>
    <h3>{{ $product -> heart_notes }}</h3>
</div>
<div>
    <h3>Notes de fond</h3>
    <h3>{{ $product -> deep_notes }}</h3>
</div>

<hr>

<h2>Profil olfactif</h1>
    <h3>Intensité {{ $product -> intensity }}
</h2>
<h3>Sillage {{ $product -> track }}</h2>

    <hr>

    <h2>Histoire et ingrédients</h1>
        <p>{{ $product -> history }}</p>

        <h3>INGREDIENTS</h3>
        <p>{{ $product -> ingredients }}</p>
        @endsection