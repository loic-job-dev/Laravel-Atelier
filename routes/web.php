<?php

use App\Http\Controllers\ProductController;


use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product/{id}', [ProductController::class, 'showProduct']);

;
Route::get('/catalog', [CatalogController::class, 'index']);
Route::get('/' , function () {
    return view('homepage');
});