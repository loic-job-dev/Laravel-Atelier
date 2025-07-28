<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{

    public function index(Request $request)
    {
        $sort = $request->query('sortby'); // ex: ?sortby=price_large
        $direction = $request->query('direction'); // ex: ?direction=desc
        $query = Product::query();

        if (in_array($sort, ['name', 'price_large'])) {
            $query->orderBy($sort, in_array($direction, ['asc', 'desc']) ? $direction : 'asc');
        }

        $products = $query->get();

        return view('/product/catalog', compact('products'));
    }

    public function show(int $id): View
    {
        $products = Product::where('id', $id)->get();
        $category = Category::select('name')->where('id', $products[0]->category_id)->get();

        return view('/product/product-details', [
            'id' => $id,
            'price' => number_format($products[0]->price_large / 100, 2, ',', ' '),
            'product' => $products[0],
            'category' => $category[0],
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        //validation optionnelle
        $request->validate([
            'name' => 'required|string|max:255',
            'price_large' => 'required|numeric',
            'price_small' => 'required|numeric',
            'description' => 'required|string',
            'quantity_stock'  => 'required|numeric',
            'category_id'  => 'required|numeric',
            'head_notes' => 'required|string|max:255',
            'heart_notes' => 'required|string|max:255',
            'deep_notes' => 'required|string|max:255',
            'intensity' => 'required|string|max:255',
            'track' => 'required|string|max:255',
            'history' => 'required|string',
            'ingredients' => 'required|string',
            //autres règles ici si nécessaire
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);

        return redirect()->route('backoffice.index')->with('success', 'Produit mis à jour avec succès.');
    }
}
