<?php

use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes for product

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/catalog', [ProductController::class, 'index']);
Route::get('/catalog/sort-name', [ProductController::class, 'SortByTittle']);
Route::get('/catalog/sort-price', [ProductController::class, 'SortByPrice']);



Route::get('/' , function () {
    return view('homepage');
});


//Routes for basket

Route::get('/basket', [BasketController::class, 'show']);


Route::prefix('backoffice')->name('backoffice.')->group(function () {
    
    Route::get('/products', [BackofficeController::class, 'index'])
        ->name('products.index');

    Route::get('/product/new', [BackofficeController::class, 'create'])
        ->name('products.create');

    
    Route::post('/product', [BackofficeController::class, 'store'])
        ->name('products.store');

   
    Route::get('/product/{id}', [BackofficeController::class, 'show'])
        ->name('products.show');

   
    Route::get('/product/{id}/edit', [BackofficeController::class, 'edit'])
        ->name('products.edit');

    Route::put('/product/{id}', [BackofficeController::class, 'update'])
        ->name('products.update');

    Route::delete('/product/{id}', [BackofficeController::class, 'destroy'])
        ->name('products.destroy');
});