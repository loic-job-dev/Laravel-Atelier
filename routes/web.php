<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes for product

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/catalog', [ProductController::class, 'display'])
     ->name('products.index');

Route::get('/products', [ProductController::class, 'display'])
     ->name('products.display');



// routes/web.php
Route::get('/', [App\Http\Controllers\HomePage::class, 'index']);


// Route::get('/' , function () {
//     return view('homepage');
// });




Route::get('/basket', [BasketController::class, 'show']);