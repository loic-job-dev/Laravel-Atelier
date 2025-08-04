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
use Stripe\Stripe;
use Stripe\PaymentIntent;

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

public function paymentForm()
{
    $products = Product::all()->keyBy('id');
    $cart = session()->get('cart', []);
    return view('basket.payment', compact('products', 'cart'));
}

public function startPayment(Request $request)
{
    $user = auth('user')->user();
    $products = Product::all()->keyBy('id');
    $cart = session()->get('cart', []);
    
    $total = 0;
    foreach ($cart as $productId => $quantity) {
        $product = $products[$productId];
        $total += $product->price_large * $quantity;
    }

    $shipping = 1590;
    $total += $shipping;

    // Création customer Stripe si inexistant
    if (!$user->hasStripeId()) {
        $user->createAsStripeCustomer();
    }

    Stripe::setApiKey(env('STRIPE_SECRET'));

    $intent = PaymentIntent::create([
        'amount' => $total,
        'currency' => 'eur',
        'customer' => $user->stripe_id,
        'payment_method' => $request->payment_method,
        'confirmation_method' => 'automatic',
        'confirm' => true,
        'return_url' => route('cart.payment.redirect'),
    ]);

    // redirection automatique si nécessaire
    if ($intent->status === 'requires_action') {
        return redirect()->away($intent->next_action->redirect_to_url->url);
    }

    // sinon, on traite immédiatement
    return $this->finalizeOrder($cart, $products, $user, $total);
}

public function handleRedirect(Request $request)
{
    $paymentIntentId = $request->get('payment_intent');

    Stripe::setApiKey(env('STRIPE_SECRET'));
    $intent = PaymentIntent::retrieve($paymentIntentId);

    if ($intent->status === 'succeeded') {
        $user = auth('user')->user();
        $products = Product::all()->keyBy('id');
        $cart = session()->get('cart', []);
        $total = $intent->amount;
        return $this->finalizeOrder($cart, $products, $user, $total);
    }

    return view('basket.payment_error', ['status' => $intent->status]);
}

private function finalizeOrder($cart, $products, $user, $total)
{
    $order = Order::create([
        'date_hour' => now(),
        'shipping_cost' => 1500,
        'total' => $total,
        'user_id' => $user->id,
    ]);

    foreach ($cart as $productId => $quantity) {
        OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    session()->forget('cart');

    return view('basket.payment_success', compact('order'));
}
}
