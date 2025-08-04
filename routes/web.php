<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Routes for product

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/catalog', [ProductController::class, 'index']);

Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

Route::post('/backoffice/product', [ProductController::class, 'create'])->name('product.create');

Route::delete('/backoffice/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');


Route::get('/' , function () {
    return view('homepage');
});



//Routes for cart

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/product/{id}',[CartController::class, 'add'])->name('cart.add');

Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');

Route::get('/cart/informations', [CartController::class, 'informations'])->name('cart.informations');

Route::post('/informations', [UserController::class, 'create'])->name('user.create');

Route::get ('/cart/summary', [CartController::class, 'summary'])->name('cart.summary');

Route::get('/cart/payment', [CartController::class, 'paymentForm'])->name('cart.payment.form');
Route::post('/cart/payment', [CartController::class, 'startPayment'])->name('cart.payment');
Route::get('/cart/payment/redirect', [CartController::class, 'handleRedirect'])->name('cart.payment.redirect');


// Routes pour le backoffice

Route::get('/backoffice', [BackofficeController::class, 'index'])->name('backoffice.index');

Route::get('/backoffice/product', [BackofficeController::class, 'product']);

Route::get('/backoffice/product/{id}', [BackofficeController::class, 'detail'])->name('product.show');

Route::get('/backoffice/product/{id}/edit', [BackofficeController::class, 'edit'])->name('product.edit');

Route::get('/backoffice/create', [BackofficeController::class, 'create']);