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
}
