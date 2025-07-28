@extends('/components/layout-backoffice')

@section('content')
    <h1 class="mb-4">Bienvenue dans le Backoffice</h1>
    <p>Page d'accueil de l'administration.</p>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
     <a href={{url ('/backoffice/product') }} class="btn btn-primary">Liste des produits</a>
     <a href={{url ('/backoffice/create') }} class="btn btn-primary"> Ajouter un parfum </a>

@endsection