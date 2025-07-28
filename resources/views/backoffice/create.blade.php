@extends('/components/layout-backoffice')

@section('content')
    <h2 class="mb-4">créer un Parfum</h2>

   <form action="{{ route('product.create') }}" method="POST">

        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="Nom" required>
            </div>

            <div class="col-md-3">
                <label for="price_large" class="form-label">Prix Large</label>
                <input type="number" step="0.01" class="form-control" id="price_large" name="price_large" value="Prix large" required>
            </div>

            <div class="col-md-3">
                <label for="price_small" class="form-label">Prix Small</label>
                <input type="number" step="0.01" class="form-control" id="price_small" name="price_small" value="Prix petit" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="quantity_stock" class="form-label">Quantité en stock</label>
            <input type="number" class="form-control" id="quantity_stock" name="quantity_stock" value="quantité" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="category_id" name="category_id" value="Numéro de catégorie" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">Description</textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="head_notes" class="form-label">Notes de Tête</label>
                <input type="text" class="form-control" id="head_notes" name="head_notes" value="Notes de tête">
            </div>
            <div class="col-md-4">
                <label for="heart_notes" class="form-label">Notes de Cœur</label>
                <input type="text" class="form-control" id="heart_notes" name="heart_notes" value="Notes de coeur">
            </div>
            <div class="col-md-4">
                <label for="deep_notes" class="form-label">Notes de Fond</label>
                <input type="text" class="form-control" id="deep_notes" name="deep_notes" value="Notes de fond">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="intensity" class="form-label">Intensité</label>
                <input type="text" class="form-control" id="intensity" name="intensity" value="Intensité">
            </div>
            <div class="col-md-6">
                <label for="track" class="form-label">Sillage</label>
                <input type="text" class="form-control" id="track" name="track" value="Sillage">
            </div>
        </div>

        <div class="mb-3">
            <label for="history" class="form-label">Histoire</label>
            <textarea class="form-control" id="history" name="history" rows="3">Histoire</textarea>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingrédients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="2">Ingrédients</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        <a href="{{ route('backoffice.index') }}" class="btn btn-secondary ms-2">Annuler</a>
    </form>
@endsection
