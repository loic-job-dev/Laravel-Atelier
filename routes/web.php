<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes for product

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/catalog', [ProductController::class, 'index']);


Route::get('/' , function () {
    return view('homepage');
});


//Routes for basket

Route::get('/basket', [BasketController::class, 'show']);