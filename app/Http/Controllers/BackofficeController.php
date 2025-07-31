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
    // pas de $product à passer ici
    return view('backoffice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'name'           => 'required|string|max:255',
        'description'    => 'required|string',
        'price_small'    => 'required|integer|min:0',
        'price_large'    => 'required|integer|min:0',
        'quantity_stock' => 'required|integer|min:0',
        'category_id'    => 'required|integer',
        'head_notes'     => 'required|string',
        'heart_notes'    => 'required|string',
        'deep_notes'     => 'required|string',
        'intensity'      => 'required|string',
        'track'          => 'required|string',
        'history'        => 'required|string',
        'ingredients'    => 'required|string',
    ]);
    // Crée le produit en base
    Product::create($data);

    // Redirige vers la liste avec un message
    return redirect()
        ->route('backoffice.products.index')
        ->with('success', 'Produit créé avec succès.');
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
            'price_small' => 'required|numeric|min:1',
            'price_large' => 'required|numeric|min:1',
            'description' => 'nullable|string',
            'quantity_stock' => 'required|numeric',
            'category_id' => 'required|numeric|min:1|max:2',
            'head_notes' => 'required|string',
            'heart_notes' => 'required|string',
            'deep_notes' => 'required|string',
            'intensity' => 'required|string',
            'track' => 'required|string',
            'history' => 'required|string',
            'ingredients' => 'required|string',
            

        ], [
            'price_small.min'    => 'Le prix petit format doit être supérieur à 1.',
            'price_large.min'    => 'Le prix grand format doit être supérieur à 5.',
            'quantity_stock.min' => 'La quantité en stock ne peut être négative.',
        ]);
        $product = Product::findOrFail($id);
        $product->update($validated);
        return redirect()
        ->route('backoffice.products.index', $product-> $id)
        ->with('success', 'Produit modifié.');
    }


    public function destroy(string $id)
    {
        Product:: destroy($id);
        return redirect()->route('backoffice.products.index')
        ->with('succes', 'Produit supprimé.');
    }
    
}
