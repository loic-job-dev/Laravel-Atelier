<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
   public function index()
    {
        $products = Product::all();
        return view('backoffice.products', compact('products'));
    }

    public function create()
    {
        return view('backoffice.new');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
        Product::create($validated);
        return redirect()->route('backoffice.products.create')->with('success', 'Produit ajouté.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backoffice.product-details', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backoffice.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
        $product = Product::findOrFail($id);
        $product->update($validated);
        return redirect()->route('backoffice.products.show', $id)->with('success', 'Produit modifié.');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('backoffice.products.index')->with('success', 'Produit supprimé.');
    }
}
