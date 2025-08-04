@extends('/components/layout')

@section('content')
<div class="container my-5">
    <h1>Paiement réussi</h1>
    <p>Merci pour votre commande !</p>

    <p>Numéro de commande : <strong>#{{ $order->id }}</strong></p>

    <a href="{{ route('cart.index') }}" class="btn btn-primary mt-4">Retour à la boutique</a>
</div>
@endsection
