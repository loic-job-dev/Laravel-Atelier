<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Backoffice\ProductController as BackofficeProductController;
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

Route::prefix('backoffice')->group(function () {
    // Liste de tous les produits
    Route::get('products', [BackofficeController::class, 'index']);
    
    // Détail d’un produit
    Route::get('product/{id}', [BackofficeController::class, 'show']);
    
    // Formulaire d’édition d’un produit
    Route::get('product/{id}/edit', [BackofficeController::class, 'edit']);


});


// routes/web.php
Route::get('/', [App\Http\Controllers\HomePage::class, 'index']);


// Route::get('/' , function () {
//     return view('homepage');
// });




Route::get('/basket', [BasketController::class, 'show']);