<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;

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



//Routes for cart

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/product/{id}',[CartController::class, 'add'])->name('cart.add');

Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');

Route::get('/cart/informations', [CartController::class, 'informations'])->name('cart.informations');

Route::post('/informations', [CustomerController::class, 'create'])->name('customer.create');

Route::get ('/cart/summary', [CartController::class, 'summary'])->name('cart.summary');

Route::get ('/cart/payment', [CartController::class, 'payment'])->name('cart.payment');



// Routes pour le backoffice

Route::get('/backoffice', [BackofficeController::class, 'index'])->name('backoffice.index');

Route::get('/backoffice/product', [BackofficeController::class, 'product']);

Route::get('/backoffice/product/{id}', [BackofficeController::class, 'detail'])->name('product.show');

Route::get('/backoffice/product/{id}/edit', [BackofficeController::class, 'edit'])->name('product.edit');

Route::get('/backoffice/create', [BackofficeController::class, 'create']);



// Routes pour l'account

Route::get('/customer/login', function () {
    if (Auth::guard('customer')->check()) {
        return redirect()->route('customer.dashboard');
    }
    return view('customer.login');
})->name('customer.login');

Route::post('/customer/login', [CustomerController::class, 'login'])->name('customer.login.submit');
Route::post('/customer/logout', [CustomerController::class, 'logout'])->name('customer.logout');

Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])
    ->middleware('auth:customer')
    ->name('customer.dashboard');

Route::get('/customer/register', function () {
    return view('customer.register');
})->name('customer.register');