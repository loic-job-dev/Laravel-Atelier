@extends('/components/layout')

@section('content')
    <h1>Bienvenue, {{ Auth::user()->first_name }}</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <p>Email : {{ Auth::user()->email }}</p>
    <p>Créé le : {{ Auth::user()->created_at }}</p>

<form action="{{ route('customer.logout') }}" method="POST">
    @csrf
    <button type="submit">Se déconnecter</button>
</form>

@endsection