<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::all()->keyBy('id');

        $cart = session()->get('cart', []);
        return view('/basket/cart', compact('cart', 'products'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product->quantity_stock == 0) {
            return redirect()->back()->with('error', 'Produit épuisé.');
        }

        $cart = session()->get('cart', []);
        $cart[$id] = ($cart[$id] ?? 0) + 1;
        session()->put('cart', $cart);

        //Voir les données envoyées dans la session :
        //dd(session('cart'));

        $product->quantity_stock--;
        $product->update();

        return redirect()->back()->with('success', 'Produit ajouté au panier.');
    }

    public function delete($id)
    {

        $product = Product::find($id);

        $cart = session()->get('cart', []);
        $quantity = $cart[$id];


        unset($cart[$id]);
        session()->put('cart', $cart);

        $product->quantity_stock += $quantity;
        $product->save();

        return redirect()->back()->with('success', 'Produit supprimé avec succès.');
    }

    public function informations()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('cart.summary');
        }

        $products = Product::all()->keyBy('id');
        $cart = session()->get('cart', []);

        return view('/basket/informations', compact('cart', 'products'));
    }

    public function summary()
    {
        $products = Product::all()->keyBy('id');
        $cart = session()->get('cart', []);

        return view('/basket/summary', compact('cart', 'products'));
    }
}
