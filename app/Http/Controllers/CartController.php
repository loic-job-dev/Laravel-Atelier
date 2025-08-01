<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;

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
        if (Auth::guard('user')->check()) {
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

        if (!Auth::guard('user')->check()) {
            return view('/basket/informations', compact('cart', 'products'));
        }

        return view('/basket/summary', compact('cart', 'products'));
    }

    public function payment() 
    {
        $products = Product::all()->keyBy('id');
        $cart = session()->get('cart', []);
        $user = auth('user')->user();

        //On crée un order
        $order = Order::create([
            'date_hour' => now(),
            'shipping_cost' => 1500,
            'total' => 0,
            'user_id' => $user->id,
        ]);

        $total = 0;

        foreach ($cart as $productId => $quantity) {
            //Avoir le nom du produit
            //echo ( $products[$productId]->name) . ' x ';
            //Avoir sa quantité commandée
            //echo ($quantity) . 'unité(s)' ;

            //Création de variables
            $product = $products[$productId];
            $subtotal = $product->price_large * $quantity;
            $total += $subtotal;
            //On crée un OrderProduct par produit
            $orderproduct = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        //On met à jour l'order avec le total correct
        $order->update([
            'total'=>$total
        ]);

        //On retire le panier de la session
        session()->forget('cart');

        return view('/basket/payment', compact('cart', 'products', 'order'));
    }
}
