<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParfumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::with('category')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price_large' => 'required|numeric|min:1',
            'price_small' => 'required|numeric|min:1',
            'description' => 'required|string',
            'quantity_stock'  => 'required|numeric|min:0',
            'category_id'  => 'required|numeric|min:1|max:2',
            'head_notes' => 'required|string|max:255',
            'heart_notes' => 'required|string|max:255',
            'deep_notes' => 'required|string|max:255',
            'intensity' => 'required|string|max:255',
            'track' => 'required|string|max:255',
            'history' => 'required|string',
            'ingredients' => 'required|string',
            // autres règles ici si nécessaire
        ]);

        $product = Product::create($validated);

        return response()->json([
            'message' => 'Produit créé avec succès.',
            'product' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}
