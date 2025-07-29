<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BackofficeController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes for product

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/catalog', [ProductController::class, 'index']);

Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

Route::post('/backoffice/product', [ProductController::class, 'create'])->name('product.create');

Route::delete('/backoffice/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');


Route::get('/' , function () {
    return view('homepage');
});


//Routes for basket

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/product/{id}',[CartController::class, 'add'])->name('cart.add');

Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');


// Routes pour le backoffice

Route::get('/backoffice', [BackofficeController::class, 'index'])->name('backoffice.index');

Route::get('/backoffice/product', [BackofficeController::class, 'product']);

Route::get('/backoffice/product/{id}', [BackofficeController::class, 'detail'])->name('product.show');

Route::get('/backoffice/product/{id}/edit', [BackofficeController::class, 'edit'])->name('product.edit');

Route::get('/backoffice/create', [BackofficeController::class, 'create']);