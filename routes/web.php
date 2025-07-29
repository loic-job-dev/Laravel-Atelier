<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
//use App\Http\Controllers\Backoffice\ProductController as BackofficeProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackofficeController;

Route::get('/', function () {
    return view('welcome');
});

// Routes for product

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/catalog', [ProductController::class, 'display'])
     ->name('products.index');

Route::get('/products', [ProductController::class, 'display'])
     ->name('products.display');

Route::prefix('backoffice')
    ->name('backoffice.')
    ->group(function () {
    // Liste de tous les produits
    Route::get('products', [BackofficeController::class, 'index'])
    ->name('products.index');

    // Créer un produit avec un formulaire vierge
    Route::get('products/create', [BackofficeController::class, 'create'])
    ->name('products.create');
    
    // Créer un produit en BDD
    Route::post('products', [BackofficeController:: class, 'store'])
    ->name('products.store');
    
    // Affiche les Détail d’un produit existant
    Route::get('products/{id}', [BackofficeController::class, 'show'])
    ->name('products.show');
    
    // Formulaire d’édition d’un produit
    Route::get('products/{id}/edit', [BackofficeController::class, 'edit'])
    ->name('products.edit');

    // Update items
    Route::put('products/{id}', [BackofficeController::class, 'update'])
    ->name('products.update');

    // Supprimer un produit
    Route::delete('products/{id}', [BackofficeController::class, 'destroy'])
    ->name('products.destroy');


});


// routes/web.php
Route::get('/', [App\Http\Controllers\HomePage::class, 'index']);


// Route::get('/' , function () {
//     return view('homepage');
// });




Route::get('/basket', [BasketController::class, 'show']);