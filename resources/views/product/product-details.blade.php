@extends("/components/layout")
@section("content")
<div class="container my-5">
    <h1 class="mb-3">Fiche du produit {{ $id }}</h1>
    <h5 class="text-muted">Boutique / {{ $product->category->name }} / {{ $product->name }}</h5>

    <div class="row my-4">
        <div class="col-md-7">
            <img src="{{ asset('storage/' . $product->picture_main) }}" class="img-fluid rounded" alt="main picture">
        </div>
        <div class="col-md-4 offset-md-1 d-flex flex-column gap-4">
            <img src="{{ asset('storage/' . $product->picture_main) }}" class="img-fluid rounded" alt="main picture">
            <img src="{{ asset('storage/' . $product->picture_bis) }}" class="img-fluid rounded" alt="picture bis">
        </div>
    </div>

    <div class="mb-4">
        <h2 class="d-inline">{{ $product->name }} - </h2>
        <h3 class="d-inline"><em>{{ $product->category->name }}</em></h3>
        <h3 class="mt-2">{{ $price }} €</h3>
    </div>

<form method="POST" action="{{ route('cart.add', ['id' => $product->id]) }}">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button class="btn btn-outline-light px-4 py-2" style="background-color: #390050;" type="submit">
        Ajouter au panier
    </button>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif
</form>

    <div class="mt-4">
        <p>{{ $product->description }}</p>
    </div>

    <hr class="my-5">

    <h2 class="mb-4 text-center">Notes olfactives</h2>

    <div class="row text-center mb-4">
        <div class="col-md-4">
            <h4>Notes de tête</h4>
            <div class="note-circle mx-auto mb-2">
                <img src="{{ asset('storage/' . $product->head_notes_picture) }}" alt="note tête" class="img-fluid rounded-circle">
            </div>
            <p>{{ $product->head_notes }}</p>
        </div>
        <div class="col-md-4">
            <h4>Notes de coeur</h4>
            <div class="note-circle mx-auto mb-2">
                <img src="{{ asset('storage/' . $product->heart_notes_picture) }}" alt="note cœur" class="img-fluid rounded-circle">
            </div>
            <p>{{ $product->heart_notes }}</p>
        </div>
        <div class="col-md-4">
            <h4>Notes de fond</h4>
            <div class="note-circle mx-auto mb-2">
                <img src="{{ asset('storage/' . $product->deep_notes_picture) }}" alt="note fond" class="img-fluid rounded-circle">
            </div>
            <p>{{ $product->deep_notes }}</p>
        </div>
    </div>

    <hr class="my-5">

    <h2 class="mb-3 text-center">Profil olfactif</h2>
    <p class="text-center"><strong>Intensité :</strong> {{ $product->intensity }}</p>
    <p class="text-center"><strong>Sillage :</strong> {{ $product->track }}</p>

    <hr class="my-5">

    <h2 class="mb-3 text-center">Histoire et ingrédients</h2>
    <p>{{ $product->history }}</p>

    <h4 class="mt-4 text-center">INGRÉDIENTS</h4>
    <p>{{ $product->ingredients }}</p>
</div>
@endsection