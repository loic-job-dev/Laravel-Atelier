<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
   
    public function index()
    {
        $products = Product::all();
        return view ('backoffice.products' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
        $product = Product::findOrFail($id);
        return view('backoffice.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('backoffice.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price_small' => 'required|numeric',
            'price_large' => 'required|numeric',
            'description' => 'nullable|string',
            'quantity_stock' => 'required|numeric',
        ]);
        $product = Product::findOrFail($id);
        $product->update($validated);
        return redirect()->route('backoffice.products.index', $id)->with('success', 'Produit modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
