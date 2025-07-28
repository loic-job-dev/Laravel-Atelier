<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\BackofficeController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes for product

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/catalog', [ProductController::class, 'index']);

Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');


Route::get('/' , function () {
    return view('homepage');
});


//Routes for basket

Route::get('/basket', [BasketController::class, 'show']);


// Routes pour le backoffice

Route::get('/backoffice', [BackofficeController::class, 'index'])->name('backoffice.index');

Route::get('/backoffice/product', [BackofficeController::class, 'product']);

Route::get('/backoffice/product/{id}', [BackofficeController::class, 'detail']);

Route::get('/backoffice/product/{id}/edit', [BackofficeController::class, 'edit']);