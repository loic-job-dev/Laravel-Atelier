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

        return response()-> view('/product/catalog', compact('products'), 200);
    }

    public function show(int $id): View
    {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            abort(404, 'Produit non trouvé.');
        }

        return view('/product/product-details', [
            'id' => $id,
            'price' => number_format($product->price_large / 100, 2, ',', ' '),
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        //validation optionnelle
        $request->validate([
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
            //autres règles ici si nécessaire
        ]);

        $data = $request->all();


        $product = Product::findOrFail($id);
        $product->update($data);

        return redirect()->route('backoffice.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function create(Request $request) {
        $data = $request->all();

                //validation optionnelle
        $request->validate([
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
            //autres règles ici si nécessaire
        ]);

         $product = Product::create($data);
         return redirect()->route('backoffice.index')->with('success', 'Produit créé avec succès.');
    }

    public function delete($id) {

        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('backoffice.index')->with('success', 'Produit supprimé avec succès.');
    }
}
