<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class BackofficeController extends Controller
{
    public function index()
    {
        return view('/backoffice/backoffice');
    }

    public function product()
    { 
            $products = Product::all();
            $category = Category::select('name')->where('id', $products[0]->category_id)->get();

            return view('/backoffice/product', [
                'price' => number_format($products[0]->price_large / 100, 2, ',', ' '),
                'products' => $products,
                'categories' => $category,
            ]);
    }

    public function detail(int $id) 
    {
        $products = Product::where('id', $id)->get();
        $category = Category::select('name')->where('id', $products[0]->category_id)->get();

        return view('/backoffice/product-details', [
            'id' => $id,
            'price' => number_format($products[0]->price_large / 100, 2, ',', ' '),
            'product' => $products[0],
            'category' => $category[0],
        ]);
    }

        public function edit(int $id) 
    {
        $products = Product::where('id', $id)->get();
        $category = Category::select('name')->where('id', $products[0]->category_id)->get();

        return view('/backoffice/edit-product', [
            'id' => $id,
            'price' => number_format($products[0]->price_large / 100, 2, ',', ' '),
            'product' => $products[0],
            'category' => $category[0],
        ]);
    }
}
