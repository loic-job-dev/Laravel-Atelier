
@extends("/components/layout")

@section("content")
  <h1 class=" text-center mb-4">Tableau de bord</h1>

  <div class="row">
    <div class="col-md-4">
      <div class="card text-white bg-primary mb-3">
        <div class="card-header">Produits</div>
        <div class="card-body">
          <h5 class="card-title">Gestion des produits</h5>
          <p class="card-text">Créer, modifier, supprimer des produits.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-white bg-success mb-3">
        <div class="card-header">Catégories</div>
        <div class="card-body">
          <h5 class="card-title">Gestion des catégories</h5>
          <p class="card-text">Créer, modifier, supprimer des catégories.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-white bg-info mb-3">
        <div class="card-header">Utilisateurs</div>
        <div class="card-body">
          <h5 class="card-title">Gestion des utilisateurs</h5>
          <p class="card-text">Créer, modifier, supprimer des utilisateurs.</p>
        </div>
      </div>
    </div>
  </div>

  
  @endsection

