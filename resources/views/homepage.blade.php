@extends('components.layout')
@section('content')

  <h1 class="text-center my-5">Nouvelles Fragrances</h1>
  <div class="container">
    <div class="row">
      @foreach(array_slice($products, 0, 2) as $product)
        <div class="col-md-12 mb-4">
          <img src="{{'/pictures/exemple.jpg'}}"
               alt="Parfum {{ $product->name }}"
               class="img-fluid mb-2">
          <h2>{{ $product->name }}. {{ $product->subtitle ?? 'Eau de Parfum' }}</h2>
          <p>{{ \Illuminate\Support\Str::limit($product->description, 150) }}</p>
          <a href="{{ url('/product/'.$product->id) }}"
             class="btn btn-primary">AJOUTER AU PANIER</a>
        </div>
      @endforeach
    </div>
  </div>

  <h1 class="text-center my-5">Nos Best Sellers</h1>
  <div class="container mt-5">
    <div class="row">
      @foreach(collect($products)->sortBy('quantity_stock')->take(4) as $product)
        <div class="col-md-6 mb-4">
          <img src="{{'/pictures/exemple.jpg'}}"
               alt="Parfum {{ $product->name }}"
               class="img-fluid mb-2">
          <h2>{{ $product->name }}. {{ $product->subtitle ?? 'Eau de Parfum' }}</h2>
          <a href="{{ url('/product/'.$product->id) }}"
             class="btn btn-primary">AJOUTER AU PANIER</a>
        </div>
      @endforeach
    </div>
  </div>

@endsection
